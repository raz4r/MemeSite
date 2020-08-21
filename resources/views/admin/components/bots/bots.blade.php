<section class="admin-content">
    <div class="bg-dark">
        <div class="container  m-b-30">
            <div class="row">
                <div class="col-12 text-white p-t-40 p-b-90">

                    <h4 class="">
                        <div class="avatar avatar-xl">
                                    <span class="avatar-title rounded-circle bg-warning"> <i
                                            class="mdi mdi-robot"></i> </span>
                        </div>
                        Lista botów
                    </h4>
                    <p class="opacity-75 ">
                        Poniżej znajduje się lista botów aktualnie dodanych do twojego systemu. Masz możliwość
                        zarządzania.


                    </p>


                </div>
            </div>
        </div>
    </div>

    <div class="container  pull-up">
        <div id="form-errors"></div>
        <div class="row create">
            <div class="col-xl">
                <div class="card">
                    <div class="card-body">

                        <h5 class="card-title">Zarządzanie botami</h5>
                        <p>Za pomocą tego formularza można instalować nowe boty.</p>
                        {!! Form::open(['class'=>'create needs-validation','novalidate','url'=>route('admin.bots.create')]) !!}
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                {!! Form::label('name','Nazwa:') !!}
                                {!! Form::text('name',null,['class'=>'form-control','required','placeholder'=>'Wpisz nazwę','disabled'=>'true']) !!}
                            </div>
                        </div>
                        {!! Form::submit('Stwórz',['class'=>'btn btn-primary','disabled'=>'true']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
        <div class="row update" style="display: none">
            <div class="col-xl">
                <div class="card">
                    <div class="card-body">

                        <h5 class="card-title">Szybka edycja</h5>
                        <p>Za pomocą tego formularza można edytować istniejące już permisje.</p>
                        {!! Form::open(['class'=>'update needs-validation','novalidate']) !!}
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                {!! Form::label('name','Permisja:') !!}
                                {!! Form::select('name',\App\Permission::pluck('name','id'),null,['class'=>'form-control custom-select','required']) !!}
                            </div>

                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                {!! Form::label('group[]','Grupa:') !!}
                                {!! Form::select('group[]',\App\Group::pluck('name','id'),null,['class'=>'form-control custom-select js-select2 select2-hidden-accessible','required','multiple','style'=>'width:100%']) !!}
                            </div>

                        </div>
                        {!! Form::submit('Edytuj',['class'=>'btn btn-primary']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">

                    <div class="card-body">
                        <div class="table-responsive p-t-10">
                            <table id="" class="table" style="width:100%">
                                <thead>
                                <tr>
                                    <th>Nazwa</th>
                                    <th>Status</th>
                                    <th>Wybierz</th>
                                </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                            <script>
                                $(document).ready(function () {
                                    window.datatable = $('.table').DataTable({
                                        columns: [
                                            {data: 'name', "sClass": 'name'},
                                            {data: 'group.[].name', "sClass": 'group'},
                                            {
                                                name: "buttons",
                                                "targets": -1,
                                                "data": null,
                                                "defaultContent": `<div class="btn-group" role="group">
                                            <button id="btnGroupDrop1" type="button"
                                                    class="btn btn-info dropdown-toggle" data-toggle="dropdown"
                                                    aria-haspopup="true" aria-expanded="false">
                                                Wybierz
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                                <a class="dropdown-item view"  href="#">Podgląd</a>
                                                <a class="dropdown-item update" href="#">Szybka edycja</a>
                                                <a class="dropdown-item update" href="#">Edycja</a>
                                                <a class="dropdown-item remove" href="#">Zablokuj</a>
                                            </div>
                                        </div>`
                                            }
                                        ],
                                        "autoWidth": true,
                                        'responsive': true,
                                        "processing": true,
                                        "serverSide": true,
                                        oLanguage: {
                                            sProcessing: `<div class="lime-body">    <div class="container">        <div class="row" style="  position: absolute;  top: 50%;  left: 50%;  transform: translate(-50%, -50%);">            <div class="col-md-8">                <div class="spinner-border" style="color: #747985" le="status">                    <span class="sr-only">Loading...</span>                </div>            </div>        </div>    </div></div>`
                                        },
                                        rowId: 'id',
                                        ajax: {
                                            "url": "{{Route('admin.permissions.store')}}",
                                            "type": "POST",
                                            "data": {"_token": "{{ csrf_token() }}"}
                                        }
                                    });
                                });

                            </script>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
