                @if ($ticket->vencimiento > $hoy)
                    <span class="label label-info">{{ $ticket->vencimiento }}</span>
                @else
                    <span class="label label-danger">{{ $ticket->vencimiento }}</span>
                    <?php
                     	$ticket->estado = 'Vencido';
				     	$ticket->save();
				    ?>
                @endif