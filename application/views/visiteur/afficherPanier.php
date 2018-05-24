       <?php echo form_open('visiteur/updatepanier'); ?>
       <div class="row">
       <div class="col"></div>
       <div class="col-sm5">
        <!--<table cellpadding="6" cellspacing="1" style="width:100%" border="0" class="table table-striped">-->
        <table class="table">
        <tr>
                <th>QTE</th>
                <th>Image</th>
                <th>Détail du produit</th>
                <th style="text-align:right">Prix du produit</th>
                <th style="text-align:right">Sub-Total</th>
        </tr>
        <?php $i = 1; ?>
        <?php foreach ($this->cart->contents() as $items): ?>
                <?php echo form_hidden($i.'[rowid]', $items['rowid']); ?>
                <tr>
                        <td><?php echo form_input(array('name' => $i.'[qty]', 'value' => $items['qty'], 'maxlength' => '3', 'size' => '5')); ?></td>
                        <td>
                                <?php if ($this->cart->has_options($items['rowid']) == TRUE): ?>
                                        <p>
                                                <?php $option =$this->cart->product_options($items['rowid']); ?>
                                                <?php echo '<div class=><img style="height:100px "class="img-fluid" src='.img_url($option['nomimage']).'>'?><br />
                                        </p>
                                <?php endif; ?>   
                        </td>
                        <td><?php echo $items['name']; ?></td></div>
                        <td style="text-align:right"><?php echo $this->cart->format_number($items['price']); ?></td>
                        <td style="text-align:right"><?php echo $this->cart->format_number($items['subtotal']); ?>€</td>
                </tr>
        <?php $i++; ?>
        <?php endforeach; ?>
        <tr>
                <td colspan="2"> </td>
                <td class="right"><strong>Total</strong></td>
                <td class="right"><?php echo $this->cart->format_number($this->cart->total()); ?>€</td>
        </tr>
        </table>
        <p><?php echo form_submit(array('type'  => 'submit','name'=>'','value'=>'Mettre à jour panier','class'=>'btn btn-primary')); ?></p>
        <?php echo form_close();?>
        <?php echo form_open('visiteur/passercommande'); ?>
        <p><?php echo form_submit(array('type'  => 'submit','name'=>'','value'=>'Passer commande','class'=>'btn btn-primary')); ?></p>
        <?php echo form_close();?>  
        </div>
        <div class="col"></div>
        </div>
        