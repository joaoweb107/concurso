<div class="span9 content_mainH no-margin-left">
    <span class="sidebar_titu">Produtos <br /> <strong class="titu_azul">Destacados</strong></span>
</div>
<div class="span9 content_main no-margin-left">
    <table class="table">
        <thead>
            <tr>
                <th align="left">PRODUTO</th>
                <th align="left">DESCRIÇÃO</th>
                <th class="hidden-tablet hidden-phone" align="left"><span class="order">FABRICANTE</span></th>
                <th align="left"><span class="order">MODELO</span></th>
                <th align="left"><span class="order">VALOR</span></th>
                <th align="left"><span class="order">VENDEDOR</span></th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 0 ?>
            <?php foreach ($produtos as $produto): ?>
                <?php $i++; ?>
                <tr <?php echo ($i == 1) ? 'class="first"' : '' ; ?>>
                    <td valign="middle" align="center">
                        <a><img src="<?php echo $this->Html->url('/app/webroot/files/teste/'.$produto['Produto']['produto_imagem'], true); ?>" width="100px"></a>
                    </td>
                    <td><?php echo utf8_encode($produto['Produto']['desc']); ?></td>
                    <td class="hidden-tablet hidden-phone" valign="middle" align="center">
                        <a><img src="<?php echo $this->Html->url('/app/webroot/files/teste/'.$produto['Produto']['imagem_marca'], true); ?>" width="100px"></a>
                    </td>
                    <td><?php echo utf8_encode($produto['Produto']['modelo']); ?></td>
                    <?php
                        $preco = explode(".", $produto['Produto']['valor'])
                    ?>
                    <td><span class="preco">R$<span><?php echo $preco[0]; ?></span>,<?php echo $preco[1]; ?></span></td>
                    <td valign="middle" align="center">
                        <a><img src="<?php echo $this->Html->url('/app/webroot/files/teste/'.$produto['Loja']['imagem_loja'], true); ?>" width="100px"></a>
                    </td>
                </tr>
            <?php endforeach; ?>
            <tr>
                <th colspan="6" class="pagination">
                    <ul>
                        <li class="active"><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#">5</a></li>
                        <li><a href="#">6</a></li>
                        <li><a href="#">7</a></li>
                        <li class="disabled"><span>...</span></li>
                        <li><a href="#">58</a></li>
                        <li><a href="#">59</a></li>
                        <li><a href="#">60</a></li>
                    </ul>
                </th>
            </tr>
        </tbody>
    </table>
</div>