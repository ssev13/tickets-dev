            <h3>Nuevo Comentario</h3>

            @include('tickets/partials/errors')

            <form method="POST" action=" {{ url('comentar', $ticket) }}" accept-charset="UTF-8">
{{--            <form method="POST" action="http://tickets.app/comentar/5" accept-charset="UTF-8"><input name="_token" type="hidden" value="VBIv3EWDAIQuLRW0cGwNQ4OsDKoRhnK2fAEF6UbQ">
--}}
                {!! csrf_field() !!}

                <div class="form-group">
                    <select class="form-control" name='tipo'>
                        @foreach ($opciones as $key)
                            <option value="{{ $key }}" {{ (old("tipo") == $key ? "selected":"") }}>{{ $key }}</option>
                        @endforeach
                    </select>               
                </div>

                <div class="form-group">
                    <label for="comentario">Comentario:</label>
                    <textarea rows="4" class="form-control" name="comentario" cols="50">{{ old('comentario') }}</textarea>
                </div>

                <div class="form-group">
                    <input type="hidden" name="responde" value="0">
                </div>

                <button type="submit" class="btn btn-primary">Enviar comentario</button>
            </form>

