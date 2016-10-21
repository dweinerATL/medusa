<div id="left-nav">
    @if(Auth::check())
        <h3 class="nav-header lnav">MEMBER</h3>
        <div class="rnav">

            <a href="/home">Service Record</a><br/>
            <a href="/id/card/{{Auth::user()->id}}">ID Card</a><br/>
            <a href="{{route('user.change.request', [Auth::user()->id])}}">Branch/Chapter Change</a><br/>
            <a href="{{ route('chapter.index') }}">Ship/Unit List</a><br/>
            <a href="{{route('user.getReset', [Auth::user()->id])}}">Change Password</a>
        </div>
        @if(!is_null(MedusaConfig::get('show.events')))
            <h3 class="nav-header lnav">Events</h3>
            <div class="rnav">
                <a href="{{route('events.create')}}">Schedule an Event</a>
                @if (count(Events::where('requestor', '=', Auth::user()->id)->get()))
                    <br/><a href="{{route('events.index')}}">View Scheduled Events</a>
                @endif
            </div>
        @endif

        @if($permsObj->hasPermissions(['DUTY_ROSTER',]) === true)
            <h3 class="nav-header lnav">CO Tools</h3>
            <div class="rnav">
                @if($permsObj->hasPermissions(['CHAPTER_REPORT',]) === true)
                    <a href="{{route('report.index')}}">Chapter Reports</a><br/>
                @endif
            </div>
        @endif
        @if($permsObj->hasPermissions(['CREATE_ECHELON',
            'EDIT_ECHELON',
            'DEL_ECHELON',
            'ASSIGN_SHIP',
            'CHANGE_ASSIGNMENT','TRIAD_REPORT']) === true)
            <h3 class="nav-header lnav">First Space Lord</h3>
            <div class="rnav">

                @if($permsObj->hasPermissions(['CREATE_ECHELON']) === true)
                    <a href="{{ route('echelon.create') }}">Activate Echelon</a><br/>
                @endif
                @if($permsObj->hasPermissions(['TRIAD_REPORT']) == true)
                    <a href="{{route('chapter.triadreport')}}">Command Triad Report</a><br/>
                @endif

            </div>
        @endif
        @if($permsObj->hasPermissions(['COMMISSION_SHIP', 'DECOMISSION_SHIP', 'EDIT_SHIP', 'VIEW_DSHIPS']) === true)
            <h3 class="nav-header lnav">BuShips (3SL)</h3>
            <div class="rnav">

                @if($permsObj->hasPermissions(['COMMISSION_SHIP', 'DECOMISSION_SHIP']) === true)<a
                        href="{{ route('chapter.create') }}">Commission Ship</a>@endif
            </div>
        @endif
        @if($permsObj->hasPermissions(['ADD_MEMBER','DEL_MEMBER','EDIT_MEMBER','VIEW_MEMBERS','PROC_APPLICATIONS','PROC_XFERS','ADD_BILLET','DEL_BILLET','EDIT_BILLET',]) === true)
            <h3 class="nav-header lnav">BuPers (5SL)</h3>
            <div class="rnav">
                @if($permsObj->hasPermissions(['VIEW_MEMBERS']) === true)<a href="{{ route('user.index') }}">List
                    Members</a><br/>
                <a href="{{route('user.find')}}">Find a Member</a><br/>
                <a href="{{route('user.dups', 'CO')}}">Show COs</a><br/>
                <a href="{{route('user.dups', 'XO')}}">Show XOs</a><br/>
                <a href="{{route('user.dups', 'BOSUN')}}">Show Bosuns</a><br/>
                @endif
                @if($permsObj->hasPermissions(['PROC_APPLICATIONS']) === true)<a href="{{ route('user.review') }}">Approve
                    Applications</a><br/>@endif
                @if($permsObj->hasPermissions(['ADD_MEMBER']) === true)<a href="{{ route('user.create') }}">Add
                    Member</a><br/>@endif
                @if($permsObj->hasPermissions(['PROC_XFERS']) === true)<a href="{{ route('user.change.review') }}">Review
                    Change Requests</a><br/>@endif
                @if($permsObj->hasPermissions(['ADD_BILLET']) === true) <a href="{{ route('billet.create') }}">Add
                    Billet</a><br/> @endif
                @if($permsObj->hasPermissions(['DEL_BILLET','EDIT_BILLET']) === true) <a
                        href="{{ route('billet.index') }}">Billet List</a><br/> @endif
            </div>
        @endif

        @if($permsObj->hasPermissions(['UPLOAD_EXAMS','ADD_GRADE', 'EDIT_GRADE']) === true)
            <h3 class="nav-header lnav">BuTrain (6SL)</h3>
            <div class="rnav">
                @if($permsObj->hasPermissions(['EDIT_GRADE']) === true)
                    <a href="{{route('exam.list')}}">Master Exam List</a><br/>
                    <a href="{{route('exam.create')}}">Add Exam</a><br/>
                    <a href="{{route('user.find')}}">Find a Member</a><br/>
                @endif
                @if($permsObj->hasPermissions(['ADD_GRADE', 'EDIT_GRADE']) === true)
                    <a href="{{route('exam.find')}}">Manage/Enter Grades</a>
                @endif
            </div>
        @endif

        @if($permsObj->hasPermissions(['ADD_MARDET','EDIT_MARDET','DELETE_MARDET', 'VIEW_RMMC']) === true)
            <h3 class="nav-header lnav">RMMC</h3>
            <div class="rnav">
                @if($permsObj->hasPermissions(['ADD_MARDET']) === true)
                    <a href="{{ route('mardet.create') }}">Stand-up MARDET</a><br/>
                @endif
                @if($permsObj->hasPermissions(['VIEW_RMMC']) === true)
                    <a href="{{route('showBranch', ['branch' => 'RMMC'])}}">Show RMMC members</a><br/>
                @endif
            </div>
        @endif


        @if($permsObj->hasPermissions(['ADD_UNIT','EDIT_UNIT','DELETE_UNIT', 'VIEW_RMA']) === true)
            <h3 class="nav-header lnav">RMA</h3>
            <div class="rnav">
                @if($permsObj->hasPermissions(['ADD_UNIT']) === true)<a
                        href="{{ route('unit.create') }}">Stand-up Command/Unit</a><br/>
                @endif
                @if($permsObj->hasPermissions(['VIEW_RMA']) === true)
                    <a href="{{route('showBranch', ['branch' => 'RMA'])}}">Show RMA members</a><br/>
                @endif
            </div>
        @endif

        @if($permsObj->hasPermissions(['VIEW_GSN']) === true)
            <h3 class="nav-header lnav">GSN</h3>
            <div class="rnav">
                @if($permsObj->hasPermissions(['VIEW_GSN']) === true)
                    <a href="{{route('showBranch', ['branch' => 'GSN'])}}">Show GSN members</a><br/>
                @endif
            </div>
        @endif

        @if($permsObj->hasPermissions(['VIEW_RHN']) === true)
            <h3 class="nav-header lnav">RHN</h3>
            <div class="rnav">
                @if($permsObj->hasPermissions(['VIEW_RHN']) === true)
                    <a href="{{route('showBranch', ['branch' => 'RHN'])}}">Show RHN members</a><br/>
                @endif
            </div>
        @endif

        @if($permsObj->hasPermissions(['VIEW_IAN']) === true)
            <h3 class="nav-header lnav">IAN</h3>
            <div class="rnav">
                @if($permsObj->hasPermissions(['VIEW_IAN']) === true)
                    <a href="{{route('showBranch', ['branch' => 'IAN'])}}">Show IAN members</a><br/>
                @endif
            </div>
        @endif


        @if($permsObj->hasPermissions(['ALL_PERMS']) === true)
            <h3 class="nav-header lnav">System</h3>
            <div class="rnav">
                <a href="{{ route('anyunit.create') }}">Create Unit/Echelon</a><br/>
                <a href="{{ route('type.index') }}">List Chapter Types</a><br/>
                <a href="{{ route('type.create') }}">Add Chapter Type</a><br/>
                <a href="{{ route('oauthclient.index') }}">List OAuth Clients</a><br/>
                <a href="{{ route('oauthclient.create') }}">Add OAuth Client</a>
                @if($permsObj->hasPermissions('CONFIG', true))<br/>
                <a href="{{ route('config.index') }}">Configuration Settings</a><br/>
                <a href="{{route('config.create')}}">Add Configuration Setting</a>
                @endif
            </div>
        @endif
    @endif
</div>

<a href="/signout"><h3 class="lnav nav-header whitesmoke">Logout</h3></a>

