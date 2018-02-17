<?php

namespace App\Awards;

use App\AwardLog;
use App\User;
use App\MedusaConfig;
use App\Utility\MedusaUtility;
use Carbon\Carbon;

/**
 * Trait AwardQualification
 *
 * @package App\Awards
 *
 * Functions to check various award qualifications
 */
trait AwardQualification
{
    /**
     * Check if a member qualifies for a MCAM and if so, how many
     *
     * @param bool $isNewAward
     *
     * @return bool
     */
    public function mcamQual($isNewAward = true)
    {
        $numMCAM = 0;

        if ($this->hasAward('ESWP') === true || $this->hasAward('OSWP') === true) {
            // If they're not qualified for a SWP, they can't qual for a MCAM

            $numExams = 0;

            foreach ($this->getExamList() as $exam) {
                if ($this->isPassingGrade($exam['score']) === true) {
                    $numExams++;
                }
            }


            if ($numExams > 40) {
                // Qualified for at least one MCAM

                $numMCAM++;

                // How many extra do they qualify for?

                $numExams -= 40;

                $numMCAM += (int)($numExams / 35);
            }
        }

        if ($numMCAM > 0) {
            // Qualified for at least 1 MCAM, update their ribbon rack
            $curNumMCAM = 0;
            $awardDates = [];

            if ($this->hasAward('MCAM')) {
                $curNumMCAM = $this->awards['MCAM']['count'];
                $awardDates = $this->awards['MCAM']['award_date'];
            }

            $newMCAM = $numMCAM - $curNumMCAM;

            $awardDate = $isNewAward === true ? Carbon::create()->firstOfMonth()
                                                      ->addMonth()
                                                      ->toDateString() : '1970-01-01';

            if ($newMCAM > 0) {
                // Calculated number of MCAM's is more the what the member
                // currently has, fill out the array of award dates
                $awardDates += array_fill(
                    $newMCAM - 1,
                    $newMCAM,
                    $awardDate
                );
            } else {
                // There is a discrepancy, set the number of award dates to match
                // the caluclated number of MCAM's per the 1SL
                $awardDates = array_fill(0, $numMCAM, $awardDate);
            }


            $results = $this->addUpdateAward([
                                             'MCAM' => [
                                                 'count' => $numMCAM,
                                                 'location' => 'L',
                                                 'award_date' => $awardDates,
                                                 'display' => true,
                                             ]
                                         ]);

            if ($results === true && $isNewAward === true) {
                // MCAM awarded and it's a new award.  Add it to their history and
                // log it

                $this->logAward(
                    'MCAM',
                    $numMCAM,
                    [
                        'timestamp' => strtotime($awardDate),
                        'event'     => MedusaUtility::ordinal($numMCAM) .
                                       ' Manticore Combat Action Medal earned on ' .
                                       $awardDate,
                    ]
                );
            }
            return $numMCAM;
        }
        return false;
    }

    /**
     * How many more exams does the member need to their next MCAM
     *
     * @return int|null
     */
    public function numToNextMcam()
    {
        if ($this->hasAward('MCAM')) {
            $numMcams = $this->awards['MCAM']['count'];

            return count($this->getExamList()) - (($numMcams * 35) + 5);
        }

        return null;
    }

    /**
     * Percentage left to next MCAM
     *
     * @return float
     */
    public function percentNextMcamLeft()
    {
        return floor($this->numToNextMcam() * 2.86);
    }

    /**
     * Percentage of next MCAM done
     *
     * @return float|int
     */
    public function percentNextMcamDone()
    {
        return 100-$this->percentNextMcamLeft();
    }

    /**
     * Check if a member qualifies for a SWP
     *
     * @param bool $isNewAward
     *
     * @return bool
     */
    public function swpQual($isNewAward = true)
    {
        // Get the users exams

        $exams = $this->getExamList();

        // Get the qualifications for a SWP

        $swpQual = MedusaConfig::get('awards.swp');

        // Get the branches to check for

        $swpBranches = MedusaConfig::get('awards.swp.branches', ['RMN', 'RMMC']);

        if (is_null($swpQual) === false &&
            in_array($this->branch, $swpBranches) === true &&
            $this->hasAward('ESWP') === false &&
            $this->hasAward('OSWP') === false) {
            // Only process if the qualifications are defined,  it's a branch we check and they don't have an E|O SWP

            $swpType = null;

            switch (substr($this->rank['grade'], 0, 1)) {
                case 'E':
                case 'W':
                    $swpType = 'Enlisted';
                    break;
                case 'O':
                case 'F':
                case 'M':
                    $swpType = 'Officer';
                    break;
            }

            // Drill down to the specific branch and officer or enlisted

            $swpQual = $swpQual[$this->branch][$swpType];

            // Check for required

            $required = 0;

            foreach ($swpQual['Required'] as $exam) {
                if (isset($exams[$exam]) === true && $this->isPassingGrade($exams[$exam]['score']) === true) {
                    $required++;
                }
            }

            if ($required == count($swpQual['Required'])) {
                $required = true;
            } else {
                $required = false;
            }
            // Check the departments

            $departments = [];

            foreach ($swpQual['Departments'] as $dept => $deptExams) {
                foreach ($deptExams as $exam) {
                    if (isset($exams[$exam]) === true && $this->isPassingGrade($exams[$exam]['score']) === true) {
                        $departments[$dept] = true;
                        break;
                    }
                }
            }

            // Do they qualify?
            if ($required === true && count($departments) >= $swpQual['NumDepts']) {
                // Yes they do, add it.

                $awardDate = $isNewAward === true ? Carbon::create()->firstOfMonth()
                                                              ->addMonth()
                                                              ->toDateString() : '1970-01-01';

                $results = $this->addUpdateAward([
                                                 substr($swpType, 0, 1) . 'SWP' => [
                                                     'count' => 1,
                                                     'location' => 'TL',
                                                     'award_date' => [$awardDate,],
                                                     'display' => false,
                                                 ]
                                             ]);

                if ($results === true && $isNewAward === true) {
                    // SWP successfully added and it's a new award.  Add it to
                    // their history and log it for BuTrain

                    $this->logAward(
                        substr($swpType, 0, 1) . 'SWP',
                        1,
                        [
                            'timestamp' => strtotime($awardDate),
                            'event'     => $this->branch . ' ' . $swpType .
                                           ' Space Warfare Pin earned on ' .
                                           $awardDate,
                        ]
                    );
                }
                return true;
            }
            return false;
        }
        return false;
    }

    /**
     * Check if it's a passing score
     *
     * @param string $score
     *
     * @return bool
     */
    private function isPassingGrade(string $score)
    {
        if (intval($score) > 70) {
            return true;
        }

        switch (substr($score, 0, 4)) {
            case 'PASS':
            case 'BETA':
            case 'CREA':
                return true;
                break;
            default:
                return false;
        }
    }

    private function logAward($award, $qty, $event)
    {
        // Add this to the members service history
        $this->addServiceHistoryEntry($event);

        // Add a log entry for BuTrain
        AwardLog::create(
            [
                'timestamp' => $event['timestamp'],
                'member_id' => $this->member_id,
                'award' => $award,
                'qty' => $qty,
            ]
        );
    }
}