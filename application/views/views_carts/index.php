<div id="wrapper-site">
    <!-- breadcrumb -->
    <nav class="breadcrumb-bg" style="display:block!important;">
        <div class="container no-index">
            <div class="breadcrumb">
                <ol>
                    <li class="breadcrumb-home">
                        <a href="<?php echo base_url(); ?>">
                            <span>Accueil</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="breadcrumb-title">
                            <span>Panier</span>
                        </a>
                    </li>
                </ol>
            </div>
        </div>
    </nav>
    <!--<?php if ($banniers) { ?>
                             <div class="section spacing-10 group-image-special block-boucherie" >
                            <div class="">
                                <div class="col-lg-12 col-md-12 categories" >
                                    <div class="effect">
									 
                                      
                                            <img class="img-fluid width-100" src="<?php echo base_url() . 'admines/medias/banners/' . $banniers->banner_picture; ?>" alt="<?php echo strip_tags($banniers->banner_title); ?>" title="<?php echo strip_tags($banniers->banner_title); ?>">
											<h1> <?php echo $banniers->banner_title; ?> </h1>
    

                                        
										                                     </div>
                                </div>
                             
                            </div>
                        </div>
						<?php } ?>-->
    <div class="container">
        <div class="row">
            <div id="content-wrapper" class="col-xs-12 col-sm-12 col-md-12 col-lg-12 onecol">
                <?php if ($this->session->flashdata('update_cart')) { ?>

                    <div class="alert alert-success" role="alert" align="center">
                        <?php echo $this->session->flashdata('update_cart'); ?>
                    </div>
                <?php } ?>
                <section id="main">
                    <?php if ($this->cart->contents()) { ?>
                        <div class="check-cart hidden_panier">
                            <!-- fieldsets -->


                        </div>
                        <div class="cart-grid row hidden_panier">


                            <div class="cart-grid-right col-xs-12 col-lg-3  show_mobile position_mobile ">
                                <?php $totalCarts = 0;
                                $totalOptionPrice = 0;
                                foreach ($this->cart->contents() as $items):

                                    if ($items['options']['optionPrice']) {
                                        $totalOptionPrice = $totalOptionPrice + $items['options']['optionPrice'];
                                    }
                                    $totalCarts = $totalCarts + ($items['price'] * $items['qty']);
                                endforeach; ?>

                                <div class="cart-summary carts-summary">
                                    <div class="cart-detailed-totals">
                                        <div class="cart-summary-products">
                                            <div class="summary-label">Il y <span
                                                        class="cart-products-panier-count"> <?php echo count($this->cart->contents()); ?> </span>
                                                commande dans votre panier
                                            </div>
                                        </div>
                                        <h2 style="color:#000;font-weight: bold;">Récapitulatif</h2>
                                        <div class="cart-summary-line" id="cart-subtotal-products">
                                                <span class="label js-subtotal">
                                                    <b>Total panier HT :</b>
                                                </span>
                                            <span class="value total_panier_cart_ht "> <?php echo number_format(($totalCarts + $totalOptionPrice) * (1 - $taxe), 2, ',', ''); ?> €</span>
                                            <div>
                                                <span class="cart-products-count"> <?php echo count($this->cart->contents()); ?> article(s)</span>
                                            </div>
                                        </div>
                                        <div class="cart-summary-line cart-subtotal-shipping-ht">
                                                <span class="label">
                                                    <b>Frais de livraison HT dés € :</b>
                                                </span>
                                            <span class="value shipping_price_ttc totalCartsTVA"
                                                  style="display: block;">  <?php echo number_format($transporters->transporter_price_in_france * (1 - $taxe), 2, ',', ''); ?></span>
                                            <div>
                                                <small class="value"></small>
                                            </div>
                                        </div>
                                        <div class="cart-summary-line cart-subtotal-shipping-ht">
                                                <span class="label">
                                                  <b> Total HT:</b>
                                                </span>
                                            <span class="value total_ht totalCartsHT"> <?php echo number_format(($totalCart + $transporters->transporter_price_in_france + $totalOptionPrice) * (1 - $taxe), 2, ',', ''); ?> €</span>
                                            <div>
                                                <small class="value"></small>
                                            </div>
                                        </div>
                                        <div class="cart-summary-line cart-total">
                                            <span class="label"><b>TVA :</b></span>
                                            <span class="value total_tva_cart"> <?php echo number_format(($totalCarts + $transporters->transporter_price_in_france + $totalOptionPrice) - (1 - $taxe) * ($totalCarts + $transporters->transporter_price_in_france + $totalOptionPrice), 2, ',', ''); ?> €</span>
                                        </div>
                                        <div class="cart-summary-line cart-total carts-totals">
                                            <span class="label">Total TTC :</span>
                                            <span class="value total_panier_cart"> <?php echo number_format($transporters->transporter_price_in_france + $totalCarts + $totalOptionPrice, 2, ',', ''); ?> €</span>
                                        </div>
                                        <div style="text-align: center;">
                                   <span><img src="<?php echo base_url(); ?>template/img/home/cb.jpg" style=""
                                              class="carte" alt="CB">

														<img src="<?php echo base_url(); ?>template/img/home/mc.jpg"
                                                             class="carte" alt="MasterCard">
														<img src="<?php echo base_url(); ?>template/img/home/visa.jpg"
                                                             class="carte" alt="VISA">
                                                           </span></div>
                                        <?php if (($this->session->userdata('logged_in')) != 1) { ?>
                                            <div id="block-checkout">
                                                <a href="<?php echo base_url() . 'accounts?callback=cart'; ?>"
                                                   class=" btn btn-primary pull-xs-right action_checkout"
                                                   style="padding-right: 7px; padding-left: 7px;">
                                                    Valider mon panier
                                                </a></div>
                                        <?php } else { ?>
                                            <div id="block-checkout">
                                                <a href="<?php echo base_url() . 'checkout'; ?>"
                                                   class=" btn btn-primary pull-xs-right action_checkout"
                                                   style="padding-right: 7px; padding-left: 7px;">
                                                    Valider mon panier
                                                </a></div>
                                        <?php } ?>
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-9 col-xs-12 check-info check-cart">

                                <div class="row">

                                    <ul id="progressbar" class="progressbar_cart" style="">


                                        <li class="active" id="panier"><strong class="tilte_progressbar"></strong>
                                            <strong>1-Panier</strong></li>

                                        <li id="delivery"><strong
                                                    class="tilte_progressbar"></strong><strong>2-Livraison</strong></li>

                                        <li id="payment"><strong
                                                    class="tilte_progressbar"></strong><strong>3-Paiement</strong></li>
                                    </ul>


                                </div>
                                <div class="row">
                                    <h2 class="cart_title">Récapitulatif</h2>
                                </div>
                                <div class="cart-container">
                                    <div class="cart-overview js-cart">

                                        <div id="block-history" class="block-center showporches">
                                            <table class="std table table_cart cart_table">

                                                <tbody class="table_list_carts">
                                                <?php $totalCart = 0;
                                                $totalOptionPrice = 0;
                                                foreach ($this->cart->contents() as $items):

                                                    $path = base_url() . 'admines/medias/products/' . $items['options']['product']->product_picture;
                                                    if ($items['options']['optionPrice']) {
                                                        $totalOptionPrice = $totalOptionPrice + $items['options']['optionPrice'];
                                                    }

                                                    $totalCart = $totalCart + ($items['price'] * $items['qty']);
                                                    ?>
                                                    <tr id="wishlist_1" class="rowid_<?php echo $items['rowid']; ?>">
                                                        <td class="">
                                                            <div class="row">
                                                                <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2">
                                                                    <?php if ($items['options']['product']->product_entier_association) { ?>
                                                                        <a href="javascript:;"><img class="img-fluid"
                                                                                                    src="<?php echo $path; ?>"
                                                                                                    alt="<?php echo $items['options']['product']->product_name; ?>"></a>

                                                                    <?php } else { ?>
                                                                        <a href="<?php echo base_url() . 'products/show/' . $items['options']['product']->product_id . '-' . strtolower(url_title($items['options']['product']->product_name)); ?>"><img
                                                                                    class="img-fluid"
                                                                                    src="<?php echo $path; ?>"
                                                                                    alt="<?php echo $items['options']['product']->product_name; ?>"></a>

                                                                    <?php } ?>
                                                                </div>
                                                                <div class="col-xs-12 col-sm-7 col-md-7 col-lg-7">
                                                                    <?php if ($items['options']['product']->product_entier_association) { ?>
                                                                        <a class="label cart_product_name"
                                                                           style="position: relative;top: 35%;"
                                                                           href="javascript:;"
                                                                           data-id_customization="0"><?php echo $items['name']; ?></a>

                                                                    <?php } else { ?>
                                                                        <a class="label cart_product_name"
                                                                           style="position: relative;top: 35%;"
                                                                           href="<?php echo base_url() . 'products/show/' . $items['options']['product']->product_id . '-' . strtolower(url_title($items['options']['product']->product_name)); ?>"
                                                                           data-id_customization="0"><?php echo $items['options']['product']->product_name; ?></a>

                                                                    <?php } ?>
                                                                </div>
                                                                <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2">
                                                                    <a class="edit-from-cart"
                                                                       onclick="edit_item('<?php echo $items['rowid']; ?>');"
                                                                       rel="nofollow" href="javascript:;"
                                                                       data-link-action="edit-from-cart"
                                                                       data-id-product="1">

                                                                        <i class="fa fa-edit"></i>
                                                                    </a>
                                                                    <a class="remove-from-cart"
                                                                       onclick="remove_item('<?php echo $items['rowid']; ?>');"
                                                                       rel="nofollow" href="javascript:;"
                                                                       data-link-action="delete-from-cart"
                                                                       data-id-product="1" style="top: 37%!important;">
                                                                        <i class="fa fa fa-trash-o"
                                                                           aria-hidden="true"></i>
                                                                    </a>
                                                                </div>
                                                            </div>


                                                            <div class="row">
                                                                <div class="col-xs-3 col-sm-2 col-md-2 col-lg-2">

                                                                </div>
                                                                <div class="col-xs-12 col-sm-10 col-md-10 col-lg-10">
                                                                    <div class="row">
                                                                        <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5 block_price_ttc">
                                                                            <span class="price_ttc">Prix TTC Unitaire</span>
                                                                            <?php if ($items['options']['product']->product_is_promo == 2) { ?>
                                                                                <div class="cart_old_price"> <?php echo number_format($items['options']['product']->product_price_selling, 2, ',', ''); ?>
                                                                                    €
                                                                                </div>
                                                                            <?php } ?>
                                                                            <span class="unitaire_price"> <?php if ($items['price'] > 0) {
                                                                                    echo number_format($items['price'], 2, ',', '') . " €";
                                                                                } else {
                                                                                    echo "N.D";
                                                                                } ?>
                                                                                <?php if ($items['options']['product']->show_poids) { ?>
                                                                                    <span class="">
                                                                                    (<?php echo $items['options']['product']->product_poids; ?> kg)</span><?php } ?>
                                                         </span>

                                                                            <?php if ($items['options']['product']->product_info) { ?>
                                                                                <span class="price_ttc"><?php echo $items['options']['product']->product_info; ?></span>
                                                                            <?php } ?>
                                                                        </div>
                                                                        <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2 block_qty">
                                                                            <span class="qty">Qté </span>
                                                                            <span class="cart_qty product_qty_<?php echo $items['rowid']; ?>"><?php echo $items['qty']; ?>    </span>


                                                                        </div>
                                                                        <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5 block_price_ttc">
                                                                            <span class="price_ttc">Prix Total TTC </span>
                                                                            <span class=" cart_new_price product_price_total_<?php echo $items['rowid']; ?>"> <?php if ($items['price'] > 0) {
                                                                                    echo number_format($items['price'] * $items['qty'], 2, ',', '');
                                                                                } else {
                                                                                    echo "N.D";
                                                                                } ?>  €</span>


                                                                        </div>


                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <?php if ($items['options']['optionPrice']){ ?>
                                                            <div class="row block_option">
                                                                <?php foreach ($items['options']['optionslist'] as $optionslist): ?>
                                                                    <div class="col-xs-3 col-sm-2 col-md-2 col-lg-2">
                                                                    </div>
                                                                    <div class="col-xs-12 col-sm-10 col-md-10 col-lg-10">
                                                                        <div class="row block_option_name">
                                                                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 block_detail_option">
                                                                                <span class="option_name"><?php echo $optionslist['option_name']; ?> (Option)</span>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5 block_colonne_option">
                                                                                <span class="">Prix TTC Unitaire</span>
                                                                            </div>
                                                                            <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2 ">
                                                                                <span class="qty">QTé </span>
                                                                            </div>
                                                                            <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5 block_colonne_option">
                                                                                <span class="">Prix Total TTC </span>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5 block_detail_option">
                                                                                <span class="option_price"> <?php if ($optionslist['option_price'] > 0) {
                                                                                        echo number_format($optionslist['option_price'], 2, ',', '');
                                                                                    } ?>  € </span>
                                                                            </div>
                                                                            <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2">
                                                                                <span class="cart_qty product_qty_<?php echo $items['rowid']; ?>"> <?php echo $items['qty']; ?>    </span>

                                                                            </div>
                                                                            <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5 block_detail_option">
																		<span class="option_price">
                                                                        <?php if ($optionslist['option_price'] > 0) {
                                                                            echo number_format($optionslist['option_price'] * $items['qty'], 2, ',', '');
                                                                        } ?> €</span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                <?php endforeach; ?>
                                                                <?php } ?>
                                                          </td>
                                                         <td class="">
                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>
                                                </tbody>
                                            </table>
                                            <!--<table class="std table table_search">
                                        <tbody>

                                            <tr>
                                                <td style="width: 100%;" >
                                                 <i class="fa fa-search search_product" aria-hidden="true"></i>
                                                 <input type="text" id="myAutocomplete" placeholder="Ajouter un article par nom" class="form-control"/>
                                                 <input type="hidden" id="is_page_cart"  class="is_page_cart" value="1"/>

                                                 <div id="output"></div>
                                                 </td>



                                             </tr>
                                        </tbody>
                                        </table>-->

                                            <table class="std table table_total show_pc">
                                                <tbody>

                                                <tr>
                                                    <td style="width: 50%;">
                                                        <div class="panier_ht">
                                                            <b>  <span class="label js-subtotal">
                                                  <b> Total panier TTC :</b>                                                </span>
                                                                <div>
                                                                    <span class="cart-products-count"> <?php echo count($this->cart->contents()); ?> article(s)</span>
                                                                </div>
                                                            </b>
                                                        </div>
                                                    </td>

                                                    <td style="width: 25%;">
                                                        <div class="price_totals">
                                                            <b>
                                                                <span class="value total_panier_cart"> <?php echo number_format($totalCart + $totalOptionPrice, 2, ',', ''); ?> €</span>
                                                        </div>
                                                        <div></div>
                                                    </td>
                                                    <td style="width: 25%;">


                                                        <?php if (($this->session->userdata('logged_in')) != 1) { ?>
                                                            <div id='block-checkout'>
                                                                <a href="<?php echo base_url() . 'accounts?callback=cart'; ?> "
                                                                   class=" btn btn-primary pull-xs-right action_checkout">
                                                                    Valider mon panier
                                                                </a></div>
                                                        <?php } else { ?>
                                                            <div id='block-checkout'>
                                                                <a href="<?php echo base_url() . 'checkout'; ?> "
                                                                   class=" btn btn-primary pull-xs-right action_checkout">
                                                                    Valider mon panier
                                                                </a></div>
                                                        <?php } ?>

                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>


                                            <table class="std table table_total show_mobile">
                                                <thead>

                                                <tr>
                                                    <td style="width: 78%;text-align: center;">
                                                        <div class="panier_ht">
                                                            <b>  <span class="label js-subtotal">
                                                   Total panier HT :
                                                </span>
                                                                <div>
                                                                    <span class="cart-products-count"> <?php echo count($this->cart->contents()); ?> article(s)</span>
                                                                </div>
                                                            </b>
                                                        </div>
                                                        <div class="price_totals">
                                                            <b>
                                                                <span class="value total_panier_cart"> <?php echo number_format((1 - $taxe) * ($totalCart + $totalOptionPrice), 2, ',', ''); ?> €</span>
                                                        </div>

                                                        <?php if (($this->session->userdata('logged_in')) != 1) { ?>
                                                            <div id="block-checkout">

                                                                <a href="<?php echo base_url() . 'accounts?callback=cart'; ?> "
                                                                   class=" btn btn-primary pull-xs-right action_checkout">
                                                                    Valider mon panier
                                                                </a></div>
                                                        <?php } else { ?>
                                                            <div id="block-checkout">
                                                                <a href="<?php echo base_url() . 'checkout'; ?> "
                                                                   class=" btn btn-primary pull-xs-right action_checkout">
                                                                    Valider mon panier
                                                                </a></div>
                                                        <?php } ?>
                                                    </td>


                                                </tr>
                                                </thead>
                                            </table>


                                        </div>


                                    </div>
                                </div>

                            </div>
                            <div class="cart-grid-right col-xs-12 col-lg-3  show_pc ">
                                <div class="cart-summary carts-summary">
                                    <div class="cart-detailed-totals">
                                        <div class="cart-summary-products">
                                            <div class="summary-label">Il y <span
                                                        class="cart-products-panier-count"> <?php echo count($this->cart->contents()); ?> </span>
                                                commande dans votre panier
                                            </div>
                                        </div>
                                        <h2 class="cart_title_summary">Récapitulatif</h2>
                                        <div class="cart-summary-line" id="cart-subtotal-products">
                                                <span class="label js-subtotal">
                                                        <b> Total panier HT :</b>
                                                </span>
                                            <span class="value total_panier_cart_ht "> <?php echo number_format(($totalCart + $totalOptionPrice) * (1 - $taxe), 2, ',', ''); ?> € </span>
                                            <div>
                                                <span class="cart-products-count"> <?php echo count($this->cart->contents()); ?> article(s)</span>
                                            </div>
                                        </div>
                                        <div class="cart-summary-line cart-subtotal-shipping-ht">
                                                <span class="label">
                                                    <b>Frais de livraison (ile de france) HT dés:</b>
                                                </span>
                                            <span class="value shipping_price_ttc"
                                                  style="display: block;"> <?php echo number_format($transporters->transporter_price_in_france * (1 - $taxe), 2, ',', ''); ?> €</span>
                                            <div>
                                                <small class="value"></small>
                                            </div>
                                        </div>
                                        <div class="cart-summary-line cart-subtotal-shipping-ht">
                                                <span class="label">
                                                    <b>Frais de livraison (Autre) HT dés:</b>
                                                </span>
                                            <span class="value shipping_price_ttc"
                                                  style="display: block;"> <?php echo number_format($transporters->transporter_price_not_france * (1 - $taxe), 2, ',', ''); ?> €</span>
                                            <div>
                                                <small class="value"></small>
                                            </div>
                                        </div>
                                        <div class="cart-summary-line cart-subtotal-shipping-ht">
                                                <span class="label">
                                                   <b>Total HT:</b>
                                                </span>
                                            <span class="value total_ht totalCartsHT"> <?php echo number_format(($totalCart + $totalOptionPrice) * (1 - $taxe), 2, ',', ''); ?> €</span>
                                            <div>
                                                <small class="value"></small>
                                            </div>
                                        </div>
                                        <div class="cart-summary-line cart-total">
                                            <span class="label"><b>TVA :</span>
                                            <span class="value total_tva_cart  totalCartsTVA"> <?php echo number_format(($totalCarts + $totalOptionPrice) - (1 - $taxe) * ($totalCarts + $totalOptionPrice), 2, ',', ''); ?> €</span>
                                        </div>
                                        <div class="cart-summary-line cart-total carts-totals"
                                             style="text-align: center;">
                                            <span class="label">Total sans Frais de livraison  TTC :</span>
                                            <span class="value total_panier_cart"> <?php echo number_format($totalCart + $totalOptionPrice, 2, ',', ''); ?> €</span>
                                        </div>
                                        <div style="text-align: center;">
                                                   <span><img src="<?php echo base_url(); ?>template/img/home/cb.jpg"
                                                              style="" class="carte" alt="CB">

														<img src="<?php echo base_url(); ?>template/img/home/mc.jpg"
                                                             class="carte" alt="MasterCard">
														<img src="<?php echo base_url(); ?>template/img/home/visa.jpg"
                                                             class="carte" alt="VISA">
                                                           </span></div>
                                        <?php if (($this->session->userdata('logged_in')) != 1) { ?>
                                            <div id="block-checkout">
                                                <a href="<?php echo base_url() . 'accounts?callback=cart'; ?>"
                                                   class=" btn btn-primary pull-xs-right action_checkout"
                                                   style="padding-right: 7px; padding-left: 7px;">
                                                    Valider mon panier
                                                </a></div>
                                        <?php } else { ?>
                                            <div id="block-checkout">
                                                <a href="<?php echo base_url() . 'checkout'; ?>"
                                                   class=" btn btn-primary pull-xs-right action_checkout"
                                                   style="padding-right: 7px; padding-left: 7px;">
                                                    Valider mon panier
                                                </a></div>
                                        <?php } ?>
                                    </div>
                                </div>


                            </div>

                        </div>
                    <?php } else { ?>
                        <div style="width: 100%;">
                            <p class="text-center">Aucun article dans votre panier.</p>
                        </div>
                    <?php } ?>
                    <div style="width: 100%; display:none;" class="message_panier">
                        <p class="text-center ">Aucun article dans votre panier.</p>
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>

<!-- Dependencies -->
<script src="<?php echo base_url() . 'template/'; ?>search/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
<script src="<?php echo base_url() . 'template/'; ?>search/popper.min.js" crossorigin="anonymous"></script>
<script src="<?php echo base_url() . 'template/'; ?>search/bootstrap.min.js" crossorigin="anonymous"></script>
<!-- Bootstrap 4 Autocomplete -->
<script src="<?php echo base_url() . 'template/'; ?>search/bootstrap-4-autocomplete.min.js"
        crossorigin="anonymous"></script>

<script>
    var src = {
        <?php foreach($products as $product) :?>
        "<?php echo $product->product_name;?>": <?php echo $product->product_id;?>,
        <?php endforeach; ?>

    }

    function onSelectItem(item, element) {
        show_product(item.value);
        $('#myAutocomplete').val("");
        $('#showProducts').addClass("showProductsCart");

    }

    $('#myAutocomplete').autocomplete({
        source: src,
        onSelectItem: onSelectItem,
        highlightClass: 'text-danger'
    });

</script>