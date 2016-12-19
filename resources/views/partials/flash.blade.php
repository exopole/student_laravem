@if(Session::has('message'))
<div id="modal1" class="modal bottom-sheet">
    <div class="modal-content">
        <div class="col s12">{{Session::get('message')}}</div>
    </div>
    <div class="modal-footer">
        <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Agree</a>
    </div>
</div>
@endif