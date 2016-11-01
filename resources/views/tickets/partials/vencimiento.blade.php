                @if ($ticket->vencimiento > $hoy)
                    <span class="label label-info">{{ $ticket->vencimiento }}</span>
                @else
                    <span class="label label-danger">{{ $ticket->vencimiento }}</span>
                    @unless ($ticket->estado = 'Cerrado')
	                    <?php
	                     	$ticket->estado = 'Vencido';
					     	$ticket->save();
					    ?>
					@endunless
                @endif