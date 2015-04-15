
<?php     
    echo $this->Paginator->options(array(
        'update' => '#content',
        'evalScripts' => true,
        'before' => $this->Js->get('#busy-indicator')->effect('fadeIn', array('buffer' => false)),
        'complete' => $this->Js->get('#busy-indicator')->effect('fadeOut', array('buffer' => false)),        
    ));
?>

<?php 
    $url   = $this->Html->url( '/Pages/display/', true );
    $valor = isset( $this->request->query['procurar'] )
        ? $this->request->query['procurar']
        : '';

    echo $this->Form->create( 'Page',  array( 'type' => 'get' ) );        
    echo $this->Form->input( 'procurar', array( 'value' => $valor ) );
    echo $this->Form->button( 'Pesquisar' );
    echo $this->Form->button( 'Resetar', array( 'onclick' => "window.location.href='{$url}'; return false" ) );
    echo $this->Form->end();
?>


<table>
    <thead>
        <tr>
            <td> <?php echo $this->Paginator->sort('nome', _( 'Nome:' )) ?></td>
            <td> <?php echo $this->Paginator->sort('frase', _( 'Frase:' )) ?></td>
            <td> <?php echo $this->Paginator->sort('unidade', _( 'Unidade:' )) ?></td>
            <td> <?php echo $this->Paginator->sort('orientador', _( 'Orientador(a):' )) ?></td>
        </tr>
    </thead>    
    <tbody>
        <?php foreach( $postagens as $post ): ?>
        <tr>
            <td> <?php echo $post['Concurso']['nome']?></td>
            <td> <?php echo $post['Concurso']['frase']?></td>
            <td> <?php echo $post['Concurso']['unidade']?></td>
            <td> <?php echo $post['Concurso']['orientador']?></td>
        </tr>
        <?php endforeach ?>
    </tbody>
</table>

<p>Você está na página: <?php echo $this->Paginator->current('Concurso') ?></p>

<?php
    echo $this->Paginator->numbers();
    echo $this->Js->writeBuffer();
?>
