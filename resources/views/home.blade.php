
@if(session('user'))
    <h3>Halo, {{ session('user')->email }}</h3>
@else
    <h3>Halo, Guest</h3>
@endif