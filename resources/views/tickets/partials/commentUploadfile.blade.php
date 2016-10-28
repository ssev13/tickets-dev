<form action=" {{ url('/addfile', $ticket->id) }}" method="POST" enctype="multipart/form-data">

    {!! csrf_field() !!}

    <input type="file" name="filefield">
    <input type="submit">
</form>
