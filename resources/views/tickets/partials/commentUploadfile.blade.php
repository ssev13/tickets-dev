<form method="POST" action="{{ url('upload',$ticket) }} enctype="multipart/form-data">
    {!! csrf_field() !!}

    <input class="form-control" type="file" name="documento"></input>
    <button class="btn btn-primary" type="submit">Guardar</button>
</form>

