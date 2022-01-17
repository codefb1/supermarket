$(document).ready(function() {
    var pathImg = base_url + "admines/medias/products/";
    $(".showMode").click(function() {
        var mode = $(this).attr('data-mode');

        jQuery.ajax({
            url: base_url + "products/modeShow/",
            data: {
                mode: mode
            },
            dataType: "json",
            type: "POST",
            success: function(data) {

            }
        });


    });
    $(".orderBy").change(function() {
        var orderBy = $(this).val();
        if (orderBy) {
            jQuery.ajax({
                url: base_url + "products/orderBy/",
                data: {
                    orderBy: orderBy
                },
                dataType: "json",
                type: "POST",
                success: function(data) {
                    if (data.result == 1) {
                        location.reload();
                    }
                }
            });
        }
    });

    $('.add-checkout_page').click(function() {
        window.location.href = base_url + "cart";
    });
    $('.add-cart').click(function() {

        var qty = $('#quantity_wanted').val();
        var product_id = $(this).attr('data-id');
        var qtyOne = $(this).attr('data-qty');
        if (qtyOne) {
            qty = qtyOne;
        }
        jQuery.ajax({
            url: base_url + "cart/add_cart",
            data: {
                product_id: product_id,
                qty: qty
            },
            dataType: "json",
            type: "POST",
            success: function(data) {
                if (data.result == 1) {
                    if (data.nbrcart == 0) {
                        $('.cart-products-count ').text('Aucune article');
                    } else {
                        $('.cart-products-count ').text(data.nbrcart + ' article(s)');
                    }

                    $('.modal_cart_items').text(data.nbrcart);
                    $('.total_cart').text('€ ' + data.totalCart);
                    $('.total_panier_cart_ttc').text('€ ' + data.totalCartttc);
                    $('.cart_items').html('');
                    $('.modal_products_cart').html('');
                    var html = "";
                    var html1 = "";
                    for (var cart in data.all_cart) {
                        html += '<tr class="rowid_' + data.all_cart[cart].rowid + '">';
                        html += '<td class="product-image">';
                        //html +='<a href="'+data.all_cart[cart].pathShowProduct+'"><img src="'+data.all_cart[cart].product_pictures+'" alt="'+data.all_cart[cart].product_name+'"></a>';
                        html += '<a href="#"><img src="' + data.all_cart[cart].product_pictures + '" alt="' + data.all_cart[cart].product_name + '"></a>';

                        html += '</td>';
                        html += '<td>';
                        html += '<div class="product-name"><a href="' + data.all_cart[cart].pathShowProduct + '">' + data.all_cart[cart].product_name + '</a></div>';
                        html += '<div>' + data.all_cart[cart].qty + ' x <span class="product-price"> € ' + data.all_cart[cart].price + '</span></div>';
                        html += '</td>';
                        html += '<td class="action">';
                        html += '<a class="remove cart_product_' + data.all_cart[cart].product_id + '" data-rowId="' + data.all_cart[cart].rowid + '"  onclick="remove_product_cart(' + data.all_cart[cart].product_id + ');" data-id=' + data.all_cart[cart].product_id + '" href="#"><i class="fa fa-trash-o" aria-hidden="true"></i></a>';
                        html += '</td>';
                        html += '</tr>';
                        html1 += '<tr class="rowid_' + data.all_cart[cart].rowid + '">';
                        html1 += '<td class="product-image" style="width: 20%;padding-bottom: 10px;">';
                        // html1 +='<a href="'+data.all_cart[cart].pathShowProduct+'"><img style="width: 100%;" src="'+data.all_cart[cart].product_pictures+'" alt="'+data.all_cart[cart].product_name+'" ></a>';
                        html1 += '<a href="#"><img style="width: 100%;" src="' + data.all_cart[cart].product_pictures + '" alt="' + data.all_cart[cart].product_name + '" ></a>';

                        html1 += '</td>';
                        html1 += '<td>';
                        html1 += '<div style="padding-left: 10px;" class="product-name"><a href="' + data.all_cart[cart].pathShowProduct + '">' + data.all_cart[cart].product_name + '</a></div>';
                        var poids = "";
                        if (data.all_cart[cart].product_poids) {
                            poids = '(' + data.all_cart[cart].product_poids + 'kg)';
                        }
                        html1 += '<div style="padding-left: 10px;">' + data.all_cart[cart].qty + ' x <span class="product-price"> € ' + data.all_cart[cart].price + '  <span>' + poids + ' </span></span></div>';
                        html1 += '</td>';
                        html1 += '</tr>';
                    }


                    $('.productName').html(data.product_name);
                    $('.cart_items').html(html);
                    $(".list_cart_modal").html('<tr id="wishlist_1" class="rowid_' + data.rowId + '"><td class=""><div class="row"><div class="col-xs-6 col-sm-4 col-md-4 col-lg-4"><a class="label cart_product_name" href="' + data.product_path + '" data-id_customization="0"><img  class="img-fluid" src="' + pathImg + '' + data.product_picture + '"alt="' + data.product_name + '"></a></div><div class="col-xs-6 col-sm-8 col-md-8 col-lg-8"><a class="label cart_product_name" href="' + data.product_path + '" data-id_customization="0"><span class="value">' + data.product_name + '</span></a></div></div></td><td class=""><span class="value">' + data.qty + '</span></td><td class=""><span class="value">€ ' + data.price + '</span></td><td><span class="value product_price_total_' + data.rowId + '" >€ ' + data.pricetotal + '</td></tr>');
                    $('.modal_products_cart').html(html1);
                    // $('#ue-notification-sucess-add').html('Produit ajouté à votre panier');

                    $('#myModalCartSave').modal('show')
                    //setTimeout(function(){$("#ue-notification-sucess-add").hide();}, 5000);
                }
            }
        })
    });
    $('.add-cart-association').click(function() {
        var product_id = $(this).attr('data-id');
        var association_id = $(this).attr('data-association');
        var qty = $('.product_consommer_'+ product_id).val();
        if (association_id) {
            qty = $('.product_offrire_' + association_id).val();
        }

        var product_id = $(this).attr('data-id');
        var option = $(this).attr('data-option');
        if (option == 1) {

            $('.quantity_product_associations').val(qty);
            $('.id_product_associations').val(product_id);
            $('.association_id').val(association_id);
            jQuery.ajax({
                url: base_url + "categoriesOptions/getoptions",
                data: {
                    product_id: product_id
                },
                dataType: "json",
                type: "POST",
                success: function(data) {

                    var html = "";

                    for (var group_option in data.group_options) {
                        html += '<div class="col-lg-12 col-md-12 col-sm-12 ">';
                        html += '<div class="row block_options">';
                        html += '<h2 class="option_type_name">' + data.group_options[group_option].option_type_name + '</h2>';
                        html += '</div>';
                        html += '<div class="row">';
                        for (var option in data.options) {
                            if (data.options[option].option_type_id == data.group_options[group_option].option_type_id) {

                                html += '<div class="col-lg-12 col-md-12 col-sm-12 ">';

                                option_price = "";
                                if (data.options[option].option_price > 0) {
                                    option_price = 'à<span>  € ' + data.options[option].option_price + '</span>';
                                }
                                html += '<p class="option_name"><input type="checkbox"  class="categorie_option_id categorie_option_id_' + data.options[option].categorie_option_id + '" name="categorie_option_id" value="' + data.options[option].categorie_option_id + '"><span class="categorieOptionId" data-id="' + data.options[option].categorie_option_id + '">' + data.options[option].option_name + ' ' + option_price + '</span></p>';
                                html += '</div>';
                            }
                        }
                        html += '</div>'
                        html += '</div>'
                    }
                    $('.list_options_associations').html(html);
                    jQuery('#showOprionAssociations').modal('show');
                }
            });
        } else {
            add_item_to_cart_association(product_id, qty, slectedOption=null,association_id);
            // $('.quantity_modal').val(1);
            //jQuery('#showProducts').modal('hide');
        }

    });
    $('.add-cart-porche').click(function() {


        var product_id = $(this).attr('data-id');
        var qty = $('#quantity_wanted-' + product_id).val();



        jQuery.ajax({
            url: base_url + "cart/add_cart",
            data: {
                product_id: product_id,
                qty: qty
            },
            dataType: "json",
            type: "POST",
            success: function(data) {
                if (data.result == 1) {
                    if (data.nbrcart == 0) {
                        $('.cart-products-count ').text('Aucune article');
                    } else {
                        $('.cart-products-count ').text(data.nbrcart + ' article(s)');
                    }

                    $('.modal_cart_items').text(data.nbrcart);
                    $('.total_cart').text('€ ' + data.totalCart);
                    $('.cart_items').html('');
                    $('.modal_products_cart').html('');
                    var html = "";
                    var html1 = "";
                    for (var cart in data.all_cart) {
                        html += '<tr class="rowid_' + data.all_cart[cart].rowid + '">';
                        html += '<td class="product-image">';
                        //html +='<a href="'+data.all_cart[cart].pathShowProduct+'"><img src="'+data.all_cart[cart].product_pictures+'" alt="'+data.all_cart[cart].product_name+'"></a>';
                        html += '<a href="#"><img src="' + data.all_cart[cart].product_pictures + '" alt="' + data.all_cart[cart].product_name + '"></a>';

                        html += '</td>';
                        html += '<td>';
                        html += '<div class="product-name"><a href="' + data.all_cart[cart].pathShowProduct + '">' + data.all_cart[cart].product_name + '</a></div>';
                        html += '<div>' + data.all_cart[cart].qty + ' x <span class="product-price"> € ' + data.all_cart[cart].price + '</span></div>';
                        html += '</td>';
                        html += '<td class="action">';
                        html += '<a class="remove cart_product_' + data.all_cart[cart].product_id + '" data-rowId="' + data.all_cart[cart].rowid + '"  onclick="remove_product_cart(' + data.all_cart[cart].product_id + ');" data-id=' + data.all_cart[cart].product_id + '" href="#"><i class="fa fa-trash-o" aria-hidden="true"></i></a>';
                        html += '</td>';
                        html += '</tr>';
                        html1 += '<tr class="rowid_' + data.all_cart[cart].rowid + '">';
                        html1 += '<td class="product-image" style="width: 20%;padding-bottom: 10px;">';
                        // html1 +='<a href="'+data.all_cart[cart].pathShowProduct+'"><img style="width: 100%;" src="'+data.all_cart[cart].product_pictures+'" alt="'+data.all_cart[cart].product_name+'" ></a>';
                        html1 += '<a href="#"><img style="width: 100%;" src="' + data.all_cart[cart].product_pictures + '" alt="' + data.all_cart[cart].product_name + '" ></a>';

                        html1 += '</td>';
                        html1 += '<td>';
                        html1 += '<div style="padding-left: 10px;" class="product-name"><a href="' + data.all_cart[cart].pathShowProduct + '">' + data.all_cart[cart].product_name + '</a></div>';
                        var poids = "";
                        if (data.all_cart[cart].product_poids) {
                            poids = '(' + data.all_cart[cart].product_poids + 'kg)';
                        }
                        html1 += '<div style="padding-left: 10px;">' + data.all_cart[cart].qty + ' x <span class="product-price"> € ' + data.all_cart[cart].price + '  <span>' + poids + ' </span></span></div>';
                        html1 += '</td>';
                        html1 += '</tr>';
                    }


                    $('.productName').html(data.product_name);
                    $('.cart_items').html(html);

                    $('.modal_products_cart').html(html1);
                    // $('#ue-notification-sucess-add').html('Produit ajouté à votre panier');
                    $(".list_cart_modal").html('<tr id="wishlist_1" class="rowid_' + data.rowId + '"><td class=""><div class="row"><div class="col-xs-6 col-sm-4 col-md-4 col-lg-4"><a class="label cart_product_name" href="' + data.product_path + '" data-id_customization="0"><img  class="img-fluid" src="' + pathImg + '' + data.product_picture + '"alt="' + data.product_name + '"></a></div><div class="col-xs-6 col-sm-8 col-md-8 col-lg-8"><a class="label cart_product_name" href="' + data.product_path + '" data-id_customization="0"><span class="value">' + data.product_name + '</span></a></div></div></td><td class=""><span class="value">' + data.qty + '</span></td><td class=""><span class="value">€ ' + data.price + '</span></td><td><span class="value product_price_total_' + data.rowId + '" >€ ' + data.pricetotal + '</td></tr>');
                    $('#myModalCartSave').modal('show')
                    //setTimeout(function(){$("#ue-notification-sucess-add").hide();}, 5000);
                }
            }
        })
    });
    $('.add-cart-association-porche').click(function() {
        var product_id = $(this).attr('data-id');
        var association_id = '';
        var product_id = $(this).attr('data-id');
        var qty = $('#quantity_wanted-' + product_id).val();


        var product_id = $(this).attr('data-id');


        jQuery.ajax({
            url: base_url + "cart/add_cart_association",
            data: {
                product_id: product_id,
                qty: qty,
                association_id: association_id
            },
            dataType: "json",
            type: "POST",
            success: function(data) {
                if (data.result == 1) {
                    if (data.nbrcart == 0) {
                        $('.cart-products-count ').text('Aucune article');
                    } else {
                        $('.cart-products-count ').text(data.nbrcart + ' article(s)');
                    }

                    $('.modal_cart_items').text(data.nbrcart);
                    $('.total_cart').text('€ ' + data.totalCart);
                    $('.total_panier_cart_ttc').text('€ ' + data.totalCartttc);

                    $('.cart_items').html('');
                    $('.modal_products_cart').html('');
                    var html = "";
                    var html1 = "";
                    for (var cart in data.all_cart) {
                        html += '<tr class="rowid_' + data.all_cart[cart].rowid + '">';
                        html += '<td class="product-image">';
                        //html +='<a href="'+data.all_cart[cart].pathShowProduct+'"><img src="'+data.all_cart[cart].product_pictures+'" alt="'+data.all_cart[cart].product_name+'"></a>';
                        html += '<a href="#"><img src="' + data.all_cart[cart].product_pictures + '" alt="' + data.all_cart[cart].product_name + '"></a>';

                        html += '</td>';
                        html += '<td>';
                        html += '<div class="product-name"><a href="' + data.all_cart[cart].pathShowProduct + '">' + data.all_cart[cart].product_name + '</a></div>';
                        html += '<div>' + data.all_cart[cart].qty + ' x <span class="product-price"> € ' + data.all_cart[cart].price + '</span></div>';
                        html += '</td>';
                        html += '<td class="action">';
                        html += '<a class="remove cart_product_' + data.all_cart[cart].product_id + '" data-rowId="' + data.all_cart[cart].rowid + '"  onclick="remove_product_cart(' + data.all_cart[cart].product_id + ');" data-id=' + data.all_cart[cart].product_id + '" href="#"><i class="fa fa-trash-o" aria-hidden="true"></i></a>';
                        html += '</td>';
                        html += '</tr>';
                        html1 += '<tr class="rowid_' + data.all_cart[cart].rowid + '">';
                        html1 += '<td class="product-image" style="width: 20%;padding-bottom: 10px;">';
                        //html1 +='<a href="'+data.all_cart[cart].pathShowProduct+'"><img style="width: 100%;" src="'+data.all_cart[cart].product_pictures+'" alt="'+data.all_cart[cart].product_name+'" ></a>';
                        html1 += '<a href="#"><img style="width: 100%;" src="' + data.all_cart[cart].product_pictures + '" alt="' + data.all_cart[cart].product_name + '" ></a>';

                        html1 += '</td>';
                        html1 += '<td>';
                        html1 += '<div style="padding-left: 10px;" class="product-name"><a href="' + data.all_cart[cart].pathShowProduct + '">' + data.all_cart[cart].product_name + '</a></div>';
                        var poids = "";
                        if (data.all_cart[cart].product_poids) {
                            poids = '(' + data.all_cart[cart].product_poids + 'kg)';
                        }
                        html1 += '<div style="padding-left: 10px;">' + data.all_cart[cart].qty + ' x <span class="product-price"> € ' + data.all_cart[cart].price + '  <span>' + poids + ' </span></span></div>';
                        html1 += '</td>';
                        html1 += '</tr>';
                    }


                    $('.productName').html(data.product_name);
                    $('.cart_items').html(html);

                    $('.modal_products_cart').html(html1);
                    // $('#ue-notification-sucess-add').html('Produit ajouté à votre panier');
                    $(".list_cart_modal").html('<tr id="wishlist_1" class="rowid_' + data.rowId + '"><td class=""><div class="row"><div class="col-xs-6 col-sm-4 col-md-4 col-lg-4"><a class="label cart_product_name" href="' + data.product_path + '" data-id_customization="0"><img  class="img-fluid" src="' + pathImg + '' + data.product_picture + '"alt="' + data.product_name + '"></a></div><div class="col-xs-6 col-sm-8 col-md-8 col-lg-8"><a class="label cart_product_name" href="' + data.product_path + '" data-id_customization="0"><span class="value">' + data.product_name + '</span></a></div></div></td><td class=""><span class="value">' + data.qty + '</span></td><td class=""><span class="value">€ ' + data.price + '</span></td><td><span class="value product_price_total_' + data.rowId + '" >€ ' + data.pricetotal + '</td></tr>');
                    $('#myModalCartSave').modal('show')
                    //setTimeout(function(){$("#ue-notification-sucess-add").hide();}, 5000);
                }
            }
        })
    });


    $("#shopping_addressss").click(function() {
        if ($(this).is(":checked")) // "this" refers to the element that fired the event
        {
            $('.shopping').css('display', 'none');
        } else {
            $('.shopping').css('display', 'block');
        }
    });

    $(".shopping_address").click(function() {
        if ($(this).is(":checked")) // "this" refers to the element that fired the event
        {
            $('.shopping').css('display', 'none');
        } else {
            $('.shopping').css('display', 'block');
        }
    });
    $('.step_2').click(function(e) {
        $('.fieldset_block_delivery').hide();
        $('.step_2').hide();
        $('.title_step_2').hide();
        $('.payments').hide();
        $('.fieldset_block_paiements').show();
        $('.step_3').show();
        $('.title_step_3').show();
        $('.payments_actvie').show();



    });
    $(".up-adress").click(function() {

        jQuery('#myModaladresseLivraison').modal('show');

    });
    $('.step_3').click(function(e) {


        $("#customer-form").submit();

    });
    $(".up-adress").click(function() {

        jQuery('#myModaladresseLivraison').modal('show');

    });
    $(document).on("click", ".mpquickview", function() {

        $('.product_price_modal').html('');

        $('.product_info_modal .product_info').html('');
        $('.product_image_modal').attr('src', '');
        $('.product_name_modal').text('');
        $('.product_price_kgs').text('');
        $('.product_short_description_modal').text('');
        $('.label_certification').html('');
        var product_id = $(this).attr('data-id');
        jQuery.ajax({
            url: base_url + "products/getdetail",
            data: {
                product_id: product_id
            },
            dataType: "json",
            type: "POST",
            success: function(data) {
                $('.product_image_modal').attr('src', data.product_picture);
                

                $('.blcok_product_short_description').hide();
                $('.product_short_description_modal').text(data.product_short_description);
                $('.product_path_modal').attr('href', data.product_path);

                if (data.product_short_description) {
                    $('.blcok_product_short_description').show();
                }
                var product_poids = '';;
                if (data.show_poids) {
                    product_poids = '- '+data.product_poids + '  kg';
                }
				$('.product_name_modal').text(data.product_name+' '+product_poids);
                var price_html = "";
                if (data.product_is_promo == 2) {
                    price_html += '<div class="product-group-price">';
                    price_html += '<span id=""  class=" "><span class="price product-price-old"> € ' + data.product_price_selling + ' </span></span>';
                    price_html += '<div class="product-price-and-shipping ">';
                    price_html += '<span class="price product-price-promo"> €   ' + data.product_price_dicount + ' </span> <span class="product_poids"> </span>';
                    price_html += '</div>';
                    price_html += ' </div>';

                } else {

                    price_html += '<div class="product-group-price">';
                    price_html += ' <div class="product-price-and-shipping">';
                    price_html += '<span class="price"> €  ' + data.product_price_selling + ' </span> <span class="product_poids"></span>';
                    price_html += '</div>';
                    price_html += '</div>';
                }

                $('.product_price_modal').html(price_html);

                $('.add_cart_modal').attr('data-id', data.product_id);
                $('.product_info_modal .product_info').html(data.product_info);
                $('.product_price_kgs').text(data.priceKg);
                $('.add_cart_modal').attr('data-option', data.show_option);


                label_certification_html = '';
                if (data.certificat_name) {

                    label_certification_html += '<span class="product-option"><img class="img-fluid" src="' + data.certificat_picture + '" alt="' + data.certificat_name + '"></span>';

                }
                if (data.product_label_rouge == 2) {

                    label_certification_html += '<span class="product-option"><img class="img-fluid" src="' + base_url + 'template/img/label-rouge.png"  alt="Produit Label Rouge"></span>';

                }
                if (data.product_origin == 2) {

                    label_certification_html += '<span class="product-option"><img class="img-fluid" src="' + base_url + 'template/img/origine-france.png" alt="Produit Origine France"></span>';

                }
                if (data.product_bio == 2) {

                    label_certification_html += '<span class="product-option"><img class="img-fluid" src="' + base_url + 'template/img/bio_3.png" alt="Produit Biologique"></span>';

                }



                $('.label_certification').html(label_certification_html);

            }
        });

        setTimeout(function() {
            jQuery('#showProducts').modal('show');
        }, 2000);

    });


    $(document).on("click", ".productComposer", function() {


        $('.product_name_composer').text('');
        $('.product_info_composer').text('');
        $('.product_poids_composer').text('');
        $('.product_short_description_composer').text('');
        $('#label_certification_info').html('');
        var product_composer_id = $(this).attr('data-id');
        if (product_composer_id) {
            jQuery.ajax({
                url: base_url + "products/getdetailProductComposer",
                data: {
                    product_composer_id: product_composer_id
                },
                dataType: "json",
                type: "POST",
                success: function(data) {

                    $('.product_name_composer').text(data.product_name);
                    $('.product_info_composer').text(data.product_info);
                    $('.product_short_description_composer').text(data.product_short_description);
                    $('.product_poids_composer').text('Poids :' + data.product_poids);
                    label_certification_html = '';
                   /* if (data.certificat_name) {

                        label_certification_html += '<span class="product-option"><img class="img-fluid" src="' + data.certificat_picture + '" alt="' + data.certificat_name + '"></span>';

                    }*/
                    if (data.product_label_rouge == 2) {

                        label_certification_html += '<span class="product-option"><img class="img-fluid" src="' + base_url + 'template/img/label-rouge.png"  alt="Produit Label Rouge"></span>';

                    }
                   /* if (data.product_origin == 2) {

                        label_certification_html += '<span class="product-option"><img class="img-fluid" src="' + base_url + 'template/img/origine-france.png" alt="Produit Origine France"></span>';

                    }*/
                    if (data.product_bio == 2) {

                        label_certification_html += '<span class="product-option"><img class="img-fluid" src="' + base_url + 'template/img/bio_3.png" alt="Produit Biologique"></span>';

                    }



                    $('#label_certification_info').html(label_certification_html);
                }
            });
        }



    });
    $('.add_cart_modal').click(function(e) {
        var product_id = $(this).attr('data-id');
        var option = $(this).attr('data-option');
        var qty = $('.quantity_modal').val();
        if (option == 1) {

            $('.quantity_product').val(qty);
            $('.id_product').val(product_id);
            $('.quantity_modal').val(1);
            jQuery.ajax({
                url: base_url + "categoriesOptions/getoptions",
                data: {
                    product_id: product_id
                },
                dataType: "json",
                type: "POST",
                success: function(data) {

                    var html = "";

                    for (var group_option in data.group_options) {
                        html += '<div class="col-lg-12 col-md-12 col-sm-12 ">';
                        html += '<div class="row block_options">';
                        html += '<h2 class="option_type_name">' + data.group_options[group_option].option_type_name + '</h2>';
                        html += '</div>';
                        html += '<div class="row">';
                        for (var option in data.options) {
                            if (data.options[option].option_type_id == data.group_options[group_option].option_type_id) {

                                html += '<div class="col-lg-12 col-md-12 col-sm-12 ">';

                                option_price = "";
                                if (data.options[option].option_price > 0) {
                                    option_price = 'à<span>  € ' + data.options[option].option_price + '</span>';
                                }
                                html += '<p class="option_name"><input type="checkbox"  class="categorie_option_id categorie_option_id_' + data.options[option].categorie_option_id + '" name="categorie_option_id" value="' + data.options[option].categorie_option_id + '"><span class="categorieOptionId" data-id="' + data.options[option].categorie_option_id + '">' + data.options[option].option_name + ' ' + option_price + '</span></p>';
                                html += '</div>';
                            }
                        }
                        html += '</div>'
                        html += '</div>'
                    }
                    $('.list_options').html(html);
                    jQuery('#showProducts').modal('hide');
                    jQuery('#showOprion').modal('show');
                }
            });
        } else {
            add_item_to_cart(product_id, qty, slectedOption = null);
            $('.quantity_modal').val(1);
            jQuery('#showProducts').modal('hide');
        }



    });

    $(document).on("click", ".add_to_cart_button", function() {
        var categorieOptionId = $(this).attr('data-id');
        var elem = $(this);
        var slectedOption = {};

        $(".categorie_option_id").each(function() {

            if ($(this).is(':checked')) {
                slectedOption[this.value] = this.value;
            }

        });
        qty = $('.quantity_product').val();
        product_id = $('.id_product').val();

        add_item_to_cart(product_id, qty, slectedOption);

    });
	
    $(document).on("click", ".update_cart_button", function() {
        var categorieOptionId = $(this).attr('data-id');
        var elem = $(this);
        var slectedOption = {};

        $(".categorie_option_id").each(function() {

            if ($(this).is(':checked')) {
                slectedOption[this.value] = this.value;
            }

        });
		var  qty = $('.product_qty_cart').val();
		var  rowids = $('.rowids').val();
		var productId= $('.productId').val();
		var associationId= $('.associationId').val();
		
        update_item_to_cart(rowids, qty, slectedOption,productId,associationId);

    });

    $(document).on("click", ".add_to_cart_button_associations", function() {
        var categorieOptionId = $(this).attr('data-id');
        var elem = $(this);
        var slectedOption = {};

        $(".categorie_option_id").each(function() {

            if ($(this).is(':checked')) {
                slectedOption[this.value] = this.value;
            }

        });
        qty = $('.quantity_product_associations').val();
        product_id = $('.id_product_associations').val();
        association_id = $('.association_id').val();

        add_item_to_cart_association(product_id, qty, slectedOption,association_id)


    });
    $(document).on("click", ".categorieOptionId", function() {
        var categorieOptionId = $(this).attr('data-id');
        $('.categorie_option_id_' + categorieOptionId).click();
    });
    $('.valsierAdress').click(function(e) {

        var regexLetter = /^[a-zA-Zàâçéèêëîïôûùüÿñæœ\s]*$/;
        var regexNum = /^[0-9]+$/;
        var validliv = true;
        var message = "Champ obligatoire \n \n";
        $(".message_erro").text('');
        if ($("#customer_delivery_firstname_modal").val() == "") {
            $(".erro_delivery_firstname_modal").text(message);
            validliv = false;
        }
        if ($("#customer_delivery_lastname_modal").val() == "") {
            $(".erro_delivery_lastname_modal").text(message);
            validliv = false;
        }

        if ($("#customer_delivery_country_modal").val() == "") {
            $(".erro_delivery_country_modal").text(message);
            validliv = false;
        }
        if ($("#customer_delivery_address_modal").val() == "") {
            $(".erro_delivery_address_modal").text(message);
            validliv = false;
        }
        if ($("#customer_delivery_zip_modal").val() == "") {
            $(".erro_delivery_zip_modal").text(message);
            validliv = false;
        }
        if ($("#customer_delivery_city_modal").val() == "") {
            $(".erro_delivery_city_modal").text(message);
            validliv = false;
        }
        if ($("#customer_delivery_phone_modal").val() == "") {
            $(".erro_delivery_phone_modal").text(message);
            validliv = false;
        }

        if (!validliv) {
            //$(window).scrollTop($('#customer_billing_country').offset().top);
        } else {


            var codeZipe = $('.customer_delivery_zip').val();

            jQuery.ajax({
                url: base_url + "checkout/getShopingPrice",
                data: {
                    codeZipe: codeZipe
                },
                dataType: "json",
                type: "POST",
                success: function(data) {

                    /*  if(data.totalshopingPrices){
							$('.shipping_price').text('€ '+data.totalshopingPrices);
							
							  $('.free').hide();
							  $('.livreur').show();
							 
							 } else  {
								 $('.livreur').hide();
								 $('.shipping_price').text('');
								 $('.free').show();
								 }
								 if(data.htShopping){
								$('.shipping_price_ttc').text('€ '+data.totalshopingPrices);
							 } else  {
								 $('.shipping_price_ttc').text('Gratuit');
								 }
							
						*/
                    $('.shipping_price').text('€ ' + data.totalshopingPrices)
                    $('.total_panier_cart').text('€ ' + data.totalCart);
                    $('.total').text('€ ' + data.total);
                    if (data.htShopping) {
                        $('.htShopping').text('€ ' + data.htShopping);
                    } else {
                        $('.htShopping').text('');
                    }
                    if (data.tvaShopping) {
                        $('.tvaShopping').text('€ ' + data.tvaShopping);
                    } else {
                        $('.tvaShopping').text('');
                    }


                    //$('.cart-subtotal-shipping-ttc').show();

                }
            });

            var firstname = $("#customer_delivery_firstname_modal").val();
            var lastname = $("#customer_delivery_lastname_modal").val();
            var country = $("#customer_delivery_country_modal").val();
            var address = $("#customer_delivery_address_modal").val();
            var zip = $("#customer_delivery_zip_modal").val();
            var city = $("#customer_delivery_city_modal").val();
            var phone = $("#customer_delivery_phone_modal").val();
            $("#customer_delivery_firstname").val(firstname);
            $("#customer_delivery_lastname").val(lastname);
            $("#customer_delivery_country").val(country);
            $("#customer_delivery_address").val(address);
            $("#customer_delivery_zip").val(zip);
            $("#customer_delivery_city").val(city);
            $("#customer_delivery_phone").val(phone);
            var countryName = "France";
            if (country == 3) {
                countryName = "Belgique";
            }
            $(".c_d_cu").text(lastname + ' ' + firstname);

            $(".c_d_ad").text(address);
            $(".c_d_ad").text(address);
            $(".c_d_ci").text(city);
            $(".c_d_zip").text(zip);

            $(".c_d_co").text(countryName);
            $(".c_d_phone").text(phone);
            jQuery('#myModaladresseLivraison').modal('hide');
        }



    });


    $(".up_adress_billing").click(function() {

        jQuery('#myModaladressebilling').modal('show');

    });

    $('.valsierAdressbilling').click(function(e) {

        var regexLetter = /^[a-zA-Zàâçéèêëîïôûùüÿñæœ\s]*$/;
        var regexNum = /^[0-9]+$/;
        var validliv = true;
        var message = "Champ obligatoire \n \n";
        $(".message_erro").text('');
        if ($("#customer_billing_firstname_modal").val() == "") {
            $(".erro_billing_firstname_modal").text(message);
            validliv = false;
        }
        if ($("#customer_billing_lastname_modal").val() == "") {
            $(".erro_billing_lastname_modal").text(message);
            validliv = false;
        }

        if ($("#customer_delivery_country_modal").val() == "") {
            $(".erro_billing_country_modal").text(message);
            validliv = false;
        }
        if ($("#customer_billing_address_modal").val() == "") {
            $(".erro_billing_address_modal").text(message);
            validliv = false;
        }
        if ($("#customer_billing_zip_modal").val() == "") {
            $(".erro_billing_zip_modal").text(message);
            validliv = false;
        }
        if ($("#customer_billing_city_modal").val() == "") {
            $(".erro_billing_city_modal").text(message);
            validliv = false;
        }
        if ($("#customer_billing_phone_modal").val() == "") {
            $(".erro_billing_phone_modal").text(message);
            validliv = false;
        }

        if (!validliv) {
            //$(window).scrollTop($('#customer_billing_country').offset().top);
        } else {


            var firstname = $("#customer_billing_firstname_modal").val();
            var lastname = $("#customer_billing_lastname_modal").val();
            var country = $("#customer_billing_country_modal").val();
            var address = $("#customer_billing_address_modal").val();
            var zip = $("#customer_billing_zip_modal").val();
            var city = $("#customer_billing_city_modal").val();
            var phone = $("#customer_billing_phone_modal").val();
            $("#customer_billing_firstname").val(firstname);
            $("#customer_billing_lastname").val(lastname);
            $("#customer_billing_country").val(country);
            $("#customer_billing_address").val(address);
            $("#customer_billing_zip").val(zip);
            $("#customer_billing_city").val(city);
            $("#customer_billing_phone").val(phone);
            var countryName = "France";
            if (country == 3) {
                countryName = "Belgique";
            }
            $(".c_b_cu").text(lastname + ' ' + firstname);

            $(".c_b_ad").text(address);
            $(".c_b_ad").text(address);
            $(".c_b_ci").text(city);
            $(".c_b_zip").text(zip);

            $(".c_b_co").text(countryName);
            $(".c_b_phone").text(phone);
            jQuery('#myModaladressebilling').modal('hide');
        }



    });
    $('.setep_21').click(function(e) {

        var regexLetter = /^[a-zA-Zàâçéèêëîïôûùüÿñæœ\s]*$/;
        var regexNum = /^[0-9]+$/;
        var validliv = true;
        var message = "Champ obligatoire \n \n";
        $(".message_erro").text('');
        if ($("#customer_delivery_firstname").val() == "") {
            $(".erro_delivery_firstname").text(message);
            validliv = false;
        }
        if ($("#customer_delivery_lastname").val() == "") {
            $(".erro_delivery_lastname").text(message);
            validliv = false;
        }

        if ($("#customer_delivery_country").val() == "") {
            $(".erro_delivery_country").text(message);
            validliv = false;
        }
        if ($("#customer_delivery_address").val() == "") {
            $(".erro_delivery_address").text(message);
            validliv = false;
        }
        if ($("#customer_delivery_zip").val() == "") {
            $(".erro_delivery_zip").text(message);
            validliv = false;
        }
        if ($("#customer_delivery_city").val() == "") {
            $(".erro_delivery_city").text(message);
            validliv = false;
        }
        if ($("#custome_deliveryry_phone").val() == "") {
            $(".erro_delivery_phone").text(message);
            validliv = false;
        }

        if ($('#shopping_address').is(':checked')) {
            //I am checked
            var firstname = $("#customer_delivery_firstname").val();
            $("#customer_billing_lastname").val(firstname);
            var lastname = $("#customer_delivery_lastname").val();
            $("#customer_billing_firstname").val(lastname)
            var country = $("#customer_delivery_country").val();
            $("#customer_billing_country").val(country);
            var address = $("#customer_delivery_address").val();
            $("#customer_billing_address").val(address);
            var zip = $("#customer_delivery_zip").val();
            $("#customer_billing_zip").val(zip);
            var city = $("#customer_delivery_city").val();
            $("#customer_billing_city").val(city);
            var phone = $("#customer_delivery_phone").val();
            $("#customer_billing_phone").val(phone);
        } else {

            if ($("#customer_billing_firstname").val() == "") {
                $(".erro_billing_firstname").text(message);
                validliv = false;
            }
            if ($("#customer_billing_lastname").val() == "") {
                $(".erro_billing_lastname").text(message);
                validliv = false;
            }
            if ($("#customer_billing_country").val() == "") {
                $(".erro_billing_country").text(message);
                validliv = false;
            }
            if ($("#customer_billing_address").val() == "") {
                $(".erro_billing_address").text(message);
                validliv = false;
            }
            if ($("#customer_billing_zip").val() == "") {
                $(".erro_billing_zip").text(message);
                validliv = false;
            }
            if ($("#customer_billing_city").val() == "") {
                $(".erro_billing_city").text(message);
                validliv = false;
            }
            if ($("#customer_billing_phone").val() == "") {
                $(".erro_billing_phone").text(message);
                validliv = false;
            }
        }
        if (!validliv) {
            //$(window).scrollTop($('#customer_billing_country').offset().top);
        } else {


            var codeZipe = $('.customer_delivery_zip').val();

            jQuery.ajax({
                url: base_url + "checkout/getShopingPrice",
                data: {
                    codeZipe: codeZipe
                },
                dataType: "json",
                type: "POST",
                success: function(data) {

                    if (data.totalshopingPrices) {
                        $('.shipping_price').text('€ ' + data.totalshopingPrices);

                        $('.free').hide();
                        $('.livreur').show();

                    } else {
                        $('.livreur').hide();
                        $('.shipping_price').text('');
                        $('.free').show();
                    }
                    if (data.htShopping) {
                        $('.shipping_price_ttc').text('€ ' + data.totalshopingPrices);
                    } else {
                        $('.shipping_price_ttc').text('Gratuit');
                    }


                    $('.total_panier_cart').text('€ ' + data.totalCart);
                    $('.total').text('€ ' + data.total);
                    if (data.htShopping) {
                        $('.htShopping').text('€ ' + data.htShopping);
                    } else {
                        $('.htShopping').text('');
                    }
                    if (data.tvaShopping) {
                        $('.tvaShopping').text('€ ' + data.tvaShopping);
                    } else {
                        $('.tvaShopping').text('');
                    }


                    $('.cart-subtotal-shipping-ttc').show();

                }
            });

            var firstname = $("#customer_delivery_firstname").val();
            var lastname = $("#customer_delivery_lastname").val();
            var country = $("#customer_delivery_country").val();
            var address = $("#customer_delivery_address").val();
            var zip = $("#customer_delivery_zip").val();
            var city = $("#customer_delivery_city").val();
            var phone = $("#customer_delivery_phone").val();
            var countryName = "France";
            if (country == 3) {
                countryName = "Belgique";
            }
            $(".client_info").text(firstname + ' ' + lastname);
            $(".client_address").text(address + ' ' + zip + ' ' + city);
            $(".client_country").text(countryName);
            $(".client_phone").text(phone);
            $(window).scrollTop($('.list_delivery').offset().top);

            //$('.block_delivery').click();
            $('.block_delivery').hide();
            $('.block_payement').show();
        }



    });
    $('.setep_3').click(function(e) {

        $(".step-number").removeClass('step-number-info');
        $(".step-title").removeClass('info');
        $('.addresses').css('display', 'none');
        $(".step-paiement").addClass('info');
        $(".step-number-paiement").addClass('step-number-info');
        $('.list_delivery').css('display', 'none');
        $('.paiements').css('display', 'inline-block');
        $(window).scrollTop($('.step-paiement').offset().top);

    });

    $(".action-button-previous").click(function() {
        $('.cart-subtotal-shipping-ttc').hide();

    });
    $(".checkout-guest-form").click(function() {
        $('.identifie').css('display', 'none');
        $('.new_acount').css('display', 'block');

    });
    $(".checkout-login-form").click(function() {
        $('.new_acount').css('display', 'none');
        $('.identifie').css('display', 'block');

    });

    $(".cookiebanner_click").click(function() {

        $('.cookiebanner-close').click();

    });
    $(".add_new_newsletter").click(function() {
        var validliv = true;
        var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
        $(".newsletter_message").html('');
        if ($(".newsletter_email").val() == "") {
            $(".newsletter_message").html('<span class="error">Veuillez saisir votre adresse e-mail.</span>');
            validliv = false;
        }

        if (!emailReg.test($(".newsletter_email").val())) {
            $(".newsletter_message").html('<span class="error">Entrez une adresse e-mail valide.</span>');
            validliv = false;
        }

        if (validliv) {
            var newsletter_email = $(".newsletter_email").val()
            jQuery.ajax({
                url: base_url + "newsletters",
                data: {
                    newsletter_email: newsletter_email
                },
                dataType: "json",
                type: "POST",
                success: function(data) {

                    if (data.result == 1) {

                        $(".newsletter_message").html('<span class="error"> Enregistré  avec succes</span>');
                    } else {
                        $(".newsletter_message").html('<span class="error">Votre email est déjà enregistré</span>');
                    }
                    $(".newsletter_email").val("");

                }
            });
        }

    });
    $(".submitMessage").click(function() {
        var valide = true;
        var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
        $(".contact_message").html('');

        if ($(".contact_lastname").val() == '') {
            $(".contact_lastname_erro").html('<span class="error">Entrez votre nom.</span>');
            valide = false;
        }

        if ($(".contact_email").val() == "" || !emailReg.test($(".contact_email").val())) {
            $(".contact_email_erro").html('<span class="error">Veuillez saisir votre adresse e-mail ou format invalide.</span>');
            valide = false;
        }


        if ($(".contact_subject").val() == '') {
            $(".contact_subject_erro").html('<span class="error">Entrez votre Sujet.</span>');
            valide = false;
        }

        if (valide) {
            var contact_lastname = $(".contact_lastname").val();
            var contact_email = $(".contact_email").val();
            var contact_message = $(".contact_message").val();
            var contact_subject = $(".contact_subject").val();
            jQuery.ajax({
                url: base_url + "contact",
                data: {
                    contact_lastname: contact_lastname,
                    contact_email: contact_email,
                    contact_message: contact_message,
                    contact_subject: contact_subject
                },
                dataType: "json",
                type: "POST",
                success: function(data) {
                    $(".is_send_message").html('<span class="is_send_message"> Votre demande été  envoyer avec succes</span>');

                    $(".contact_lastname").val("");
                    $(".contact_email").val("");
                    $(".contact_message").val("");
                    $(".contact_subject").val("");

                }
            });
        }

    });

});



function remove_item(rowid) {
    jQuery.ajax({
        url: base_url + "cart/removeItem",
        data: {
            rowid: rowid
        },
        dataType: "json",
        type: "POST",
        success: function(data) {
            if (data.nbrcart == 0) {
                $('.cart-products-count ').text('Aucune article');
            } else {
                $('.cart-products-count ').text(data.nbrcart + ' article(s)');
            }
            $('.total_cart').text('€ ' + data.totalCart);
            $('.cart-products-panier-count').text(data.nbrcart);
            $('.total_panier_cart').text('€ ' + data.totalCart);
            $('.total_panier_cart_ttc').text('€ ' + data.totalCartttc);
            $('.total_tva_cart').text('€ ' + data.totalCartTva);
            $('.totalCartsHT').text('€ ' + data.totalCartsHT);
            $('.totalCartsTVA').text('€ ' + data.totalCartsTVA);
            $('.rowid_' + rowid).hide();
            if (data.nbrcart == 0) {
                $('.hidden_panier').hide();
                $('.message_panier').show();
                var html = "";
                html += '<tr>';
                html += '<td>';
                html += '<div style="width: 100%;">';
                html += '<p class="text-center">Aucun article dans votre panier.</p>';
                html += '</div>';
                html += '</td>';
                html += '</tr>';
                $('.cart_items').html(html);

            }
        }
    });
}


$('.add-cart-new').click(function(e) {
    var product_id = $(this).attr('data-id');
    var option = $(this).attr('data-option');
    var qty = $('#quantity_wanted').val();
    if (option == 1) {

        $('#quantity_product').val(qty);
        $('.id_product').val(product_id);

        jQuery.ajax({
            url: base_url + "categoriesOptions/getoptions",
            data: {
                product_id: product_id
            },
            dataType: "json",
            type: "POST",
            success: function(data) {

                var html = "";

                for (var group_option in data.group_options) {
                    html += '<div class="col-lg-12 col-md-12 col-sm-12 ">';
                    html += '<div class="row block_options">';
                    html += '<h2 class="option_type_name">' + data.group_options[group_option].option_type_name + '</h2>';
                    html += '</div>';
                    html += '<div class="row">';
                    for (var option in data.options) {
                        if (data.options[option].option_type_id == data.group_options[group_option].option_type_id) {

                            html += '<div class="col-lg-12 col-md-12 col-sm-12 ">';

                            option_price = "";
                            if (data.options[option].option_price > 0) {
                                option_price = 'à<span>  € ' + data.options[option].option_price + '</span>';
                            }
                            html += '<p class="option_name"><input type="checkbox"  class="categorie_option_id categorie_option_id_' + data.options[option].categorie_option_id + '" name="categorie_option_id" value="' + data.options[option].categorie_option_id + '"><span class="categorieOptionId" data-id="' + data.options[option].categorie_option_id + '">' + data.options[option].option_name + ' ' + option_price + '</span></p>';
                            html += '</div>';
                        }
                    }
                    html += '</div>'
                    html += '</div>'
                }
                $('.list_options').html(html);
                jQuery('#showProducts').modal('hide');
                jQuery('#showOprion').modal('show');
            }
        });
    } else {
        add_item_to_cart(product_id, qty, slectedOption = null);

        jQuery('#showProducts').modal('hide');
    }



});

function show_product(product_id) {
$('.product_price_modal').html('');
$('.product_info_modal .product_info').html('');
$('.product_image_modal').attr('src', '');
$('.product_name_modal').text('');
$('.product_price_kgs').text('');
$('.product_short_description_modal').text('');
$('.label_certification').html('');

        jQuery.ajax({
            url: base_url + "products/getdetail",
            data: {
                product_id: product_id
            },
            dataType: "json",
            type: "POST",
            success: function(data) {
                $('.product_image_modal').attr('src', data.product_picture);
                

                $('.blcok_product_short_description').hide();
                $('.product_short_description_modal').text(data.product_short_description);
                $('.product_path_modal').attr('href', data.product_path);

                if (data.product_short_description) {
                    $('.blcok_product_short_description').show();
                }
                var product_poids = '';;
                if (data.show_poids) {
                    product_poids = '- '+data.product_poids + '  kg';
                }
				$('.product_name_modal').text(data.product_name+' '+product_poids);
                var price_html = "";
                if (data.product_is_promo == 2) {
                    price_html += '<div class="product-group-price">';
                    price_html += '<span id=""  class=" "><span class="price product-price-old"> € ' + data.product_price_selling + ' </span></span>';
                    price_html += '<div class="product-price-and-shipping ">';
                    price_html += '<span class="price product-price-promo"> €   ' + data.product_price_dicount + ' </span> <span class="product_poids"> </span>';
                    price_html += '</div>';
                    price_html += ' </div>';

                } else {

                    price_html += '<div class="product-group-price">';
                    price_html += ' <div class="product-price-and-shipping">';
                    price_html += '<span class="price"> €  ' + data.product_price_selling + ' </span> <span class="product_poids"></span>';
                    price_html += '</div>';
                    price_html += '</div>';
                }

                $('.product_price_modal').html(price_html);

                $('.add_cart_modal').attr('data-id', data.product_id);
                $('.product_info_modal .product_info').html(data.product_info);
                $('.product_price_kgs').text(data.priceKg);
                $('.add_cart_modal').attr('data-option', data.show_option);


                label_certification_html = '';
                if (data.certificat_name) {

                    label_certification_html += '<span class="product-option"><img class="img-fluid" src="' + data.certificat_picture + '" alt="' + data.certificat_name + '"></span>';

                }
                if (data.product_label_rouge == 2) {

                    label_certification_html += '<span class="product-option"><img class="img-fluid" src="' + base_url + 'template/img/label-rouge.png"  alt="Produit Label Rouge"></span>';

                }
                if (data.product_origin == 2) {

                    label_certification_html += '<span class="product-option"><img class="img-fluid" src="' + base_url + 'template/img/origine-france.png" alt="Produit Origine France"></span>';

                }
                if (data.product_bio == 2) {

                    label_certification_html += '<span class="product-option"><img class="img-fluid" src="' + base_url + 'template/img/bio_3.png" alt="Produit Biologique"></span>';

                }



                $('.label_certification').html(label_certification_html);

            }
        });

        setTimeout(function() {
            jQuery('#showProducts').modal('show');
        }, 2000);

	}
function add_item_to_cart(id, qty, slectedOption = null) {
    var product_id = id;
    var pathImg = base_url + "admines/medias/products/";
    jQuery.ajax({
        url: base_url + "cart/add_cart",
        data: {
            product_id: product_id,
            qty: qty,
            slectedOption: slectedOption
        },
        dataType: "json",
        type: "POST",
        success: function(data) {
            if (data.result == 1) {
                if (data.nbrcart == 0) {
                    $('.cart-products-count').text('Aucune article');
                } else {
                    $('.cart-products-count').text(data.nbrcart + ' article(s)');
                }

                $('.modal_cart_items').text(data.nbrcart);
                $('.total_cart').text('€ ' + data.totalCart);
                $('.total_panier_cart_ttc').text('€ ' + data.totalCartttc);
                $('.total_tva_cart').text('€ ' + data.totalCartTva);

                $('.cart_items').html('');
                $('.modal_products_cart').html('');
                var html = "";
                var html1 = "";
                for (var cart in data.all_cart) {
                    html += '<tr class="rowid_' + data.all_cart[cart].rowid + '">';
                    html += '<td class="product-image">';
                    //html +='<a href="'+data.all_cart[cart].pathShowProduct+'"><img src="'+data.all_cart[cart].product_pictures+'" alt="'+data.all_cart[cart].product_name+'"></a>';
                    html += '<a href="#"><img src="' + data.all_cart[cart].product_pictures + '" alt="' + data.all_cart[cart].product_name + '"></a>';

                    html += '</td>';
                    html += '<td>';
                    html += '<div class="product-name"><a href="' + data.all_cart[cart].pathShowProduct + '">' + data.all_cart[cart].product_name + '</a>';

                    html += '</div>';
                    html += '<div>' + data.all_cart[cart].qty + ' x <span class="product-price"> € ' + data.all_cart[cart].price + '</span></div>';
                    if (data.all_cart[cart].optionPrice) {
                        html += '<div>Option:  <span classs="product-option-price">€ ' + data.all_cart[cart].optionPrice + ' </span></span></div>';
                    }
                    html += '</td>';
                    html += '<td class="action">';
                    html += '<a class="remove cart_product_' + data.all_cart[cart].product_id + '" data-rowId="' + data.all_cart[cart].rowid + '"  onclick="remove_product_cart(' + data.all_cart[cart].product_id + ');" data-id=' + data.all_cart[cart].product_id + '" href="#"><i class="fa fa-trash-o" aria-hidden="true"></i></a>';
                    html += '</td>';
                    html += '</tr>';
                    html1 += '<tr class="rowid_' + data.all_cart[cart].rowid + '">';
                    html1 += '<td class="product-image" style="width: 20%;padding-bottom: 10px;">';
                    // html1 +='<a href="'+data.all_cart[cart].pathShowProduct+'"><img style="width: 100%;" src="'+data.all_cart[cart].product_pictures+'" alt="'+data.all_cart[cart].product_name+'" ></a>';
                    html1 += '<a href="#"><img style="width: 100%;" src="' + data.all_cart[cart].product_pictures + '" alt="' + data.all_cart[cart].product_name + '" ></a>';

                    html1 += '</td>';
                    html1 += '<td>';
                    html1 += '<div style="padding-left: 10px;" class="product-name"><a href="' + data.all_cart[cart].pathShowProduct + '">' + data.all_cart[cart].product_name + '</a></div>';
                    var poids = "";
                    if (data.all_cart[cart].product_poids) {
                        poids = '(' + data.all_cart[cart].product_poids + 'kg)';
                    }
                    html1 += '<div style="padding-left: 10px;">' + data.all_cart[cart].qty + ' x <span class="product-price"> € ' + data.all_cart[cart].price + '  <span>' + poids + ' </span></span></div>';
                    html1 += '</td>';
                    html1 += '</tr>';
                }


                $('.productName').html(data.product_name);
                $('.cart_items').html(html);
               
                product_options = "";
				//options_price = "";
                for (var optionlist in data.optionslist) {
					options_price = "€ 0.00";;
					 product_options_price = "€ 0.00";
                    if (data.optionslist[optionlist].option_price_rectif > 0) {
                        product_options_price = '€ ' +data.optionslist[optionlist].option_price_rectif;
						options_price = '€' +data.optionslist[optionlist].option_price_unitaire;
                    }
                    product_options += '<tr id="wishlist_1" ><td class=""><div class="row"><div class="col-xs-6 col-sm-4 col-md-4 col-lg-4"></div><div class="col-xs-6 col-sm-8 col-md-8 col-lg-8">' + data.optionslist[optionlist].option_name + '<b>(option)</b></div></div></td><td class=""><span class="value">'+data.optionslist[optionlist].qty+'</span></td><td class=""><span class="value">'+options_price+'</span></td><td><span class="" > ' + product_options_price + '</td></tr>';
                }
				if(product_options){
					product_options += '<tr id="wishlist_1" ><td class=""><div class="row"><div class="col-xs-6 col-sm-4 col-md-4 col-lg-4"></div><div class="col-xs-6 col-sm-8 col-md-8 col-lg-8"></div></div></td><td class=""><span class="value"></span></td><td class="">Total</td><td><span class="" > ' + data.totalPriceAndoption + '</td></tr>';
				}
				
           
               // $(".table_list_carts").append('<tr id="wishlist_1" class="rowid_' + data.rowId + '"><td class=""><div class="row"><div class="col-xs-6 col-sm-4 col-md-4 col-lg-4"><a class="label cart_product_name" href="' + data.product_path + '" data-id_customization="0"><img  class="img-fluid" src="' + pathImg + '' + data.product_picture + '"alt="' + data.product_name + '"></a></div><div class="col-xs-6 col-sm-8 col-md-8 col-lg-8"><a class="label cart_product_name" href="' + data.product_path + '" data-id_customization="0">' + data.product_name + '</a></div></div></td><td class=""> <div class="quantity quantityup"><input  id="qty" type="text" value=1 class="qtyUpforce" name="qtyUp" data-bts-min="1"data-bts-max="100" data-bts-prefix-extra-class="' + data.rowId + '" data-bts-booster="true"  data-bts-boostat="10" data-bts-max-boosted-step="false"  data-bts-mousewheel="true" data-bts-button-down-class="btn btn-secondary" data-bts-button-up-class="btn btn-secondary"/> </div></td><td class=""><span class="value">€ ' + data.price + '</span></td><td><span class="value product_price_total_' + data.rowId + '" >€ ' + data.pricetotal + '</td><td> <a class="remove-from-cart cart_product_' + data.product_id + '" onclick="remove_product_cart(' + data.product_id + ');" rel="nofollow" href="#" data-link-action="delete-from-cart" data-rowid="' + data.rowId + '"  data-id-product="' + data.product_id + '"><i class="fa fa-trash-o" aria-hidden="true"></i></a></td></tr>');
                /*$("input[name='qtyUp']").TouchSpin({
                    verticalbuttons: true
                });*/
                $(".list_cart_modal").html('<tr id="wishlist_1" class="rowid_' + data.rowId + '"><td class=""><div class="row"><div class="col-xs-6 col-sm-4 col-md-4 col-lg-4"><a class="label cart_product_name" href="' + data.product_path + '" data-id_customization="0"><img  class="img-fluid" src="' + pathImg + '' + data.product_picture + '"alt="' + data.product_name + '"></a></div><div class="col-xs-6 col-sm-8 col-md-8 col-lg-8"><a class="label cart_product_name" href="' + data.product_path + '" data-id_customization="0">' + data.product_name + '</a></div></div></td><td class="">' + data.qty + '</td><td class=""><span class="value">€ ' + data.price + '</span></td><td><span class="value product_price_total_' + data.rowId + '" >€ ' + data.pricetotal + '</td></tr>' + product_options);
                $('.modal_products_cart').html(html1);
                // $('#ue-notification-sucess-add').html('Produit ajouté à votre panier');
				if($('.is_page_cart').val()){
					jQuery('.cart-footer').css('display','none');
					}
				
                jQuery('#showOprion').modal('hide');
                $('#myModalCartSave').modal('show')
				
				if($('.is_page_cart').val()){
				setTimeout(function() {location.reload();}, 2000);
				}
               
            }
        }
    })



}

function remove_product_cart(product_id) {
    var rowid = $(".cart_product_" + product_id).attr('data-rowid');
    jQuery.ajax({
        url: base_url + "cart/removeItem",
        data: {
            rowid: rowid
        },
        dataType: "json",
        type: "POST",
        success: function(data) {
            if (data.nbrcart == 0) {
                $('.cart-products-count ').text('Aucune article');
            } else {
                $('.cart-products-count ').text(data.nbrcart + ' article(s)');
            }
            $('.total_cart').text('€ ' + data.totalCart);
            $('.cart-products-panier-count').text(data.nbrcart);
            $('.total_panier_cart').text('€ ' + data.totalCart);
            $('.total_panier_cart_ttc').text('€ ' + data.totalCartttc);
            $('.total_tva_cart').text('€ ' + data.totalCartTva);

            $('.rowid_' + rowid).hide();
            if (data.nbrcart == 0) {
                $('.hidden_panier').hide();
                $('.message_panier').show();
                var html = "";
                html += '<tr>';
                html += '<td>';
                html += '<div style="width: 100%;">';
                html += '<p class="text-center">Aucun article dans votre panier.</p>';
                html += '</div>';
                html += '</td>';
                html += '</tr>';
                $('.cart_items').html(html);

            }

        }
    });
}

function add_item_to_cart_association(product_id, qty, slectedOption = null,association_id=null) {

    var pathImg = base_url + "admines/medias/products/";
    jQuery.ajax({
        url: base_url + "cart/add_cart_association",
        data: {
            product_id: product_id,
            qty: qty,
            association_id: association_id,
            slectedOption: slectedOption
        },
        dataType: "json",
        type: "POST",
        success: function(data) {
            if (data.result == 1) {
                if (data.nbrcart == 0) {
                    $('.cart-products-count ').text('Aucune article');
                } else {
                    $('.cart-products-count ').text(data.nbrcart + ' article(s)');
                }

                $('.modal_cart_items').text(data.nbrcart);
                $('.total_cart').text('€ ' + data.totalCart);
                $('.total_panier_cart_ttc').text('€ ' + data.totalCartttc);
                $('.cart_items').html('');
                $('.modal_products_cart').html('');
                var html = "";
                var html1 = "";
                for (var cart in data.all_cart) {
                    html += '<tr class="rowid_' + data.all_cart[cart].rowid + '">';
                    html += '<td class="product-image">';
                    //html +='<a href="'+data.all_cart[cart].pathShowProduct+'"><img src="'+data.all_cart[cart].product_pictures+'" alt="'+data.all_cart[cart].product_name+'"></a>';
                    html += '<a href="#"><img src="' + data.all_cart[cart].product_pictures + '" alt="' + data.all_cart[cart].product_name + '"></a>';

                    html += '</td>';
                    html += '<td>';
                    html += '<div class="product-name"><a href="' + data.all_cart[cart].pathShowProduct + '">' + data.all_cart[cart].product_name + '</a></div>';
                    html += '<div>' + data.all_cart[cart].qty + ' x <span class="product-price"> € ' + data.all_cart[cart].price + '</span></div>';
                    if (data.all_cart[cart].optionPrice) {
                        html += '<div>Option:  <span classs="product-option-price">€ ' + data.all_cart[cart].optionPrice + ' </span></span></div>';
                    }

                    html += '</td>';
                    html += '<td class="action">';
                    html += '<a class="remove cart_product_' + data.all_cart[cart].product_id + '" data-rowId="' + data.all_cart[cart].rowid + '"  onclick="remove_product_cart(' + data.all_cart[cart].product_id + ');" data-id=' + data.all_cart[cart].product_id + '" href="#"><i class="fa fa-trash-o" aria-hidden="true"></i></a>';
                    html += '</td>';
                    html += '</tr>';
                    html1 += '<tr class="rowid_' + data.all_cart[cart].rowid + '">';
                    html1 += '<td class="product-image" style="width: 20%;padding-bottom: 10px;">';
                    //html1 +='<a href="'+data.all_cart[cart].pathShowProduct+'"><img style="width: 100%;" src="'+data.all_cart[cart].product_pictures+'" alt="'+data.all_cart[cart].product_name+'" ></a>';
                    html1 += '<a href="#"><img style="width: 100%;" src="' + data.all_cart[cart].product_pictures + '" alt="' + data.all_cart[cart].product_name + '" ></a>';

                    html1 += '</td>';
                    html1 += '<td>';
                    html1 += '<div style="padding-left: 10px;" class="product-name"><a href="' + data.all_cart[cart].pathShowProduct + '">' + data.all_cart[cart].product_name + '</a></div>';
                    var poids = "";
                    if (data.all_cart[cart].product_poids) {
                        poids = '(' + data.all_cart[cart].product_poids + 'kg)';
                    }
                    html1 += '<div style="padding-left: 10px;">' + data.all_cart[cart].qty + ' x <span class="product-price"> € ' + data.all_cart[cart].price + '  <span>' + poids + ' </span></span></div>';
                    html1 += '</td>';
                    html1 += '</tr>';
                }


                $('.productName').html(data.product_name);
                $('.cart_items').html(html);
                
                product_options = "";
				
                for (var optionlist in data.optionslist) {
					 product_options_price = "€ 0.00";
				 options_price = "€ 0.00";
                    if (data.optionslist[optionlist].option_price_rectif > 0) {
                        product_options_price = '€' +data.optionslist[optionlist].option_price_rectif;
						options_price = '€ ' +data.optionslist[optionlist].option_price_unitaire;
                    }
                    product_options += '<tr id="wishlist_1" ><td class=""><div class="row"><div class="col-xs-6 col-sm-4 col-md-4 col-lg-4"></div><div class="col-xs-6 col-sm-8 col-md-8 col-lg-8">' + data.optionslist[optionlist].option_name + '<b>(option)</b></div></div></td><td class=""><span class="value">'+data.optionslist[optionlist].qty+'</span></td><td class=""><span class="value">'+options_price+'</span></td><td><span class="" > ' + product_options_price + '</td></tr>';
                }
				if(product_options){
					product_options += '<tr id="wishlist_1" ><td class=""><div class="row"><div class="col-xs-6 col-sm-4 col-md-4 col-lg-4"></div><div class="col-xs-6 col-sm-8 col-md-8 col-lg-8"></div></div></td><td class=""><span class="value"></span></td><td class="">Total</td><td><span class="" > ' + data.totalPriceAndoption + '</td></tr>';
				}
				
                $('.modal_products_cart').html(html1);
                // $('#ue-notification-sucess-add').html('Produit ajouté à votre panier');
                $(".list_cart_modal").html('<tr id="wishlist_1" class="rowid_' + data.rowId + '"><td class=""><div class="row"><div class="col-xs-6 col-sm-4 col-md-4 col-lg-4"><a class="label cart_product_name" href="' + data.product_path + '" data-id_customization="0"><img  class="img-fluid" src="' + pathImg + '' + data.product_picture + '"alt="' + data.product_name + '"></a></div><div class="col-xs-6 col-sm-8 col-md-8 col-lg-8"><a class="label cart_product_name" href="' + data.product_path + '" data-id_customization="0"><span class="value">' + data.product_name + '</span></a></div></div></td><td class=""><span class="value">' + data.qty + '</span></td><td class=""><span class="value">€ ' + data.price + '</span></td><td><span class="value product_price_total_' + data.rowId + '" >€ ' + data.pricetotal + '</td></tr>' + product_options);
                jQuery('#showOprionAssociations').modal('hide');
                $('#myModalCartSave').modal('show')
                //setTimeout(function(){$("#ue-notification-sucess-add").hide();}, 5000);
            }
        }
    })



}

function edit_item(rowid) {
    $('.product_price_cart').text('');
    $('.product_info_cart').text('');
    $('.product_name_cart').text('');
    $('.product_price_cart').html('');
    $('.product_price_total_cart').text('');
	$('.productEntierAssociation').val('');
	$('.productId').val('');
	$('.associationId').val('');
    jQuery.ajax({
        url: base_url + "cart/editItem",
        data: {
            rowid: rowid
        },
        dataType: "json",
        type: "POST",
        success: function(data) {
            $('.product_image_cart').attr('src', data.productPicture);
            $('.product_info_cart').text(data.productInfo);
            
			

            $('.product_qty_cart').val(data.qty);
            $('.product_price_total_cart').text(data.pricetotal);
            var product_poids = '';
            if (data.show_poids) {
                product_poids = ' - '+data.product_poids + '  kg';
            }
			$('.product_name_cart').text(data.productName+''+product_poids);
			//$('.product_poids_cart').text(product_poids);
            var price_html = "";
            if (data.product_is_promo == 2) {
                price_html += '<div class="product-group-price">';
                price_html += '<span id=""  class=" "><span class="price product-price-old"> € ' + data.product_price_selling + ' </span></span>';
                price_html += '<div class="product-price-and-shipping ">';
                price_html += '<span class="price product-price-promo"> €   ' + data.product_price_dicount + ' </span> ';
                price_html += '</div>';
                price_html += ' </div>';

            } else {

                price_html += '<div class="product-group-price">';
                price_html += ' <div class="product-price-and-shipping">';
                price_html += '<span class="price"> €  ' + data.product_price_selling + ' </span>';
                price_html += '</div>';
                price_html += '</div>';
            }
            $('.product_info_cart .product_info').html(data.product_info);
            $('.product_price_kgs_cart').text(data.priceKg);
            $('.product_price_cart').html(price_html);
                 var options_html = "";

                for (var group_option in data.group_options) {
                    options_html += '<div class="col-lg-12 col-md-12 col-sm-12 ">';
                    options_html += '<div class="row block_options">';
                    options_html += '<h2 class="option_type_name">' + data.group_options[group_option].option_type_name + '</h2>';
                    options_html += '</div>';
                    options_html += '<div class="row">';
                    for (var option in data.options) {
						
                        if (data.options[option].option_type_id == data.group_options[group_option].option_type_id) {
                       
						 var isCheck = '';
						if($.inArray(data.options[option].categorie_option_id, data.checkListOptions) > -1){
						isCheck = 'checked';  
						}
                            options_html += '<div class="col-lg-12 col-md-12 col-sm-12 ">';

                            option_price = "";
                            if (data.options[option].option_price > 0) {
                                option_price = 'à<span>  € ' + data.options[option].option_price + '</span>';
                            }
                            options_html += '<p class="option_name"><input '+isCheck+' type="checkbox"  class="categorie_option_id categorie_option_id_' + data.options[option].categorie_option_id + '" name="categorie_option_id" value="' + data.options[option].categorie_option_id + '"><span class="categorieOptionId" data-id="' + data.options[option].categorie_option_id + '">' + data.options[option].option_name + ' ' + option_price + '</span></p>';
                            options_html += '</div>';
                        }
                    }
                    options_html += '</div>'
                    options_html += '</div>'
                }
			$('.productEntierAssociation').val(data.productEntierAssociation);
			$('.productId').val(data.productId);
			$('.associationId').val(data.associationId);
			$('.rowids').val(data.rowids);
			$('.list_options').html(options_html);
            $('#editCart').modal('show')
        }
    });
}
function update_item_to_cart(rowid, qty, slectedOption = null,productId,associationId= null) {
 jQuery.ajax({
        url: base_url + "cart/updateCarteItem",
        data: {
			rowid: rowid,
			qty: qty,
			slectedOption: slectedOption,
			productId: productId,
        },
        dataType: "json",
        type: "POST",
        success: function(data) {
            location.reload();

        }
    });
}