(function($){
    var methods = {
        init : function(options) {
            var defaults = {
                treeData: [{'label': 'Empty tree'}],
                inner_util_class: 'ni_inner_util_class'
            };
            options = $.extend(defaults, options);
            function addNodes($el, treeData, root){
                treeData.forEach(function(child){
                    child.attributes = child.attributes || {};
                    $.each(child.attributes, function(key, value){
                        child.attributes[key] = $.isArray(value) ? value.join(' ') : value;
                    });
                    if(child.id){
                        child.attributes.id = child.id;
                    }
                    var $ul = $('<ul>', root ? {'class': 'ni_tree'} : {}),
                        $li = $('<li>', child.attributes),
                        $label = $('<span/>').html(child.label);
                    $li.append($label);
                    $ul.append($li);
                    $el.append($ul);
                    if(child.children){
                        addNodes($li, child.children);
                    }
                });
            }
            function init_tree_open_close($parentElement, except_class){
                //get the relevant elemants
                var $elements = $parentElement.find('li');
                if(except_class){
                    $elements = $elements.filter(':not(.' + except_class + ')');
                }

                //append checkboxes
//                $elements
//                    .filter(':not(.ni_tree_no_checkbox)')
//                    .prepend($('<input>', {'type': 'checkbox', 'class': 'ni_tree_checkbox', 'name': $($parentElement).attr('id')}));
                $elements.filter(function(index){
                    if ( ! $(this).hasClass('ni_tree_no_checkbox')) {
                        $(this).prepend($('<input>', {'type': 'checkbox', 'class': 'ni_tree_checkbox', 'name': $(this).attr('id')}));
                    }
                });

                //if it's about appending a subtree (e.i. there is except_class) then open/close control should be appended also to the $parentElement if it didn't have subtree before
                if(except_class && !$parentElement.closest('ul').hasClass('has_subtree')){
                    $parentElement.addClass('has_subtree');
                    $elements = $elements.add($parentElement);
                }

                //append open/close control
                $elements
                    .has('ul')
                    .prepend($('<span>', {'class': 'ni_tree_ctrl'}))
                    .parent().addClass('has_subtree');

                //open/close functionality for the tree
                $elements.find('.ni_tree_ctrl').on('click.ni_tree_open_close', function(){
                    $(this).closest('li')
                        .toggleClass('ni_tree_close');
                });

            }

            //disable the checkboxes of the empty lists (empty = doesn't have li-children with checkboxes)
            function disable_checkboxes_for_empty_lists($tree, number_of_effected){
                var $empty_lists = $tree.find('li').add($tree) //add $tree itself so when the subtree without checkboxes is added the $tree's checkbox will be disabled
                    .has('li')
                    .filter(':not(:has(li .ni_tree_checkbox))');
                $empty_lists.children('.ni_tree_checkbox').prop('disabled', true);
                $empty_lists.children('.ni_tree_checkbox')
                    .removeClass('ni_tree_checkbox')
                    .addClass('ni_tree_checkbox_disabled');
                if($empty_lists.length && (number_of_effected != $empty_lists.length)){
                    disable_checkboxes_for_empty_lists($tree, $empty_lists.length);
                }
            }

            /*
                function for push product to bestsellers
             */

            function _push_product(item){
                $(".bestsellers-table tbody").append('<tr id="'+_get_id_chek(item)+'"><td>' + $('#' + $(item).attr('name') + ' > span').text() + '</td><td><input class="form-control" type="text" name="best_product[' + _get_id_chek(item) + ']" data-parsley-id="9027" value=""></td></tr>');
            }

            /*
                function for get id_product
             */
            function _get_id_chek(item){
                return $(item).attr('name').replace("product-id_", "");
            }

            /*
             function for unset product to bestsellers
             */

            function _take_product(item){
                $(".bestsellers-table tbody tr#"+_get_id_chek(item)).remove();
            }

            function init_checking_behavior($tree){
                $tree.find('.ni_tree_checkbox').on('change.ni_tree_checking_behavior', function(){

                    var checked = $(this).is(':checked');

                    if((checked) && ($(this).attr('name').indexOf('item-of-product-id_')==0)){

                        get_product = $('[name="product-id_'+($(this).attr('name').replace("item-of-product-id_", "")).split('-')[0]+'"]');

                        if((checked)) {
                            if ($(".bestsellers-table tbody tr#"+_get_id_chek(get_product)).attr('id')===undefined) {
                                _push_product(get_product);
                                get_product.addClass('check');
                            }

                        }


                    }else if((!checked) && ($(this).attr('name').indexOf('item-of-product-id_')==0)){
                        get_product = $('[name="product-id_'+($(this).attr('name').replace("item-of-product-id_", "")).split('-')[0]+'"]');

                        if(get_product+':not(:checked)'){
                            flag = false;
                            get_product.parent().find('ul li .ni_tree_checkbox').each(function() {
                                if($(this).is(':checked')){
                                    flag = true;
                                }

                            });
                                if(flag == false) {
                                    _take_product(get_product);
                                }
                        }



                    }

                    if((checked) && ($(this).attr('name').indexOf('product-id_')==0)) {
                        if ($(".bestsellers-table tbody tr#"+_get_id_chek(this)).attr('id')===undefined) {
                            _push_product(this);
                        }
                    }else if((checked) && ($(this).attr('name').indexOf('product-id_')==-1)) {
                        $(this).parent().find('.ni_tree_checkbox').each(function(){
                            if((checked) && ($(this).attr('name').indexOf('product-id_')==0)) {

                                if ($(".bestsellers-table tbody tr#"+_get_id_chek(this)).attr('id')===undefined) {
                                    _push_product(this);
                                }
                            }
                        })

                    }else if ((!checked) && ($(this).attr('name').indexOf('product-id_')==0)){
                        _take_product(this);
                    }else{
                        $(this).parent().find('.ni_tree_checkbox').each(function(){
                            if((!checked) && ($(this).attr('name').indexOf('product-id_')==0)) {
                                _take_product(this);
                            }
                        })
                    }

                    $(this).parent().find('.ni_tree_checkbox')
                        .prop('checked', checked)
                        .prop('indeterminate', false);

                    $(this).prop("indeterminate", false);
                    $(this).parents('li')
                        .each(function(){
                            var $container_li = $(this).parents('li:first');
                            var $containers_checkboxes = $container_li.children('input.ni_tree_checkbox');
                            $containers_checkboxes.prop("indeterminate", false);
                            if ($container_li.find('li input.ni_tree_checkbox:not(:checked)').length) {
                                $containers_checkboxes.prop('checked', false);
                                if ($container_li.find('li input.ni_tree_checkbox:checked').length) {
                                    $containers_checkboxes.prop("indeterminate", true);

                                }
                            } else {
                                $containers_checkboxes.prop('checked', true);
                                //$(".bestsellers-table tbody").append('<tr id="'+id_check+'"><td>' + $('#' + $(this).attr('name') + ' span').text() + '</td><td><input class="form-control" type="text" name="best_product[' + id_check + ']" data-parsley-id="9027" value=""></td></tr>');

                            }
                        });

                });
                $tree.find('li.ni_tree_init_checked>.ni_tree_checkbox')
                    .prop('checked', true)
                    .change();
            }
            return this.each(function() {
                if(!options.parentNodeID){
                    addNodes($(this), options.treeData, true);

                    init_tree_open_close($(this));
                    disable_checkboxes_for_empty_lists($(this));
                    init_checking_behavior($(this));
                } else {
                    var $parentNode = $(this).find('#' + options.parentNodeID);
                    //mark the existing nodes under the parentNode so we don't effect them again
                    $parentNode.find('li').addClass(options.inner_util_class);

                    //append the subtree and add functionality
                    addNodes($parentNode, options.treeData, false);
                    init_tree_open_close($parentNode, options.inner_util_class);
                    disable_checkboxes_for_empty_lists($(this));//$(this) - because appending leafs can effect parents
                    init_checking_behavior($parentNode);

                    //remove the mark the existing nodes
                    $parentNode.find('li').removeClass(options.inner_util_class);
                }
            });
        },
        //options example: {selected: false, leafsOnly: true} - get unselected leafs
        get: function(options){
            var defaults = {selected: true, attributeToSelect: 'id'};
            options = $.extend(defaults, options);
            var $lis = this;
            if(options.leafsOnly){
                $lis = this.find('li:not(:has(ul))');
            }
            var $treeCheckboxes;
            if(options.selected){
                $treeCheckboxes = $lis.find('.ni_tree_checkbox:checked');
            } else {
                $treeCheckboxes = $lis.find('.ni_tree_checkbox:not(:checked)');
            }
            return $treeCheckboxes.map(function(){
                return $(this).parent().attr(options.attributeToSelect);
            }).toArray();
        },
        expandAll : function() {
            this.find('.has_subtree').children('li').removeClass('ni_tree_close');
            return this;
        },
        collapseAll : function() {
            this.find('.has_subtree').children('li').addClass('ni_tree_close');
            return this;
        }
    };

    $.fn.niTree = function(methodOrOptions) {
        if(methods[methodOrOptions] ){
            return methods[ methodOrOptions].apply(this, Array.prototype.slice.call(arguments, 1));
        } else if (typeof methodOrOptions === 'object' || ! methodOrOptions) {
            // Default to "init"
            return methods.init.apply(this, arguments);
        } else {
            $.error('Method ' +  methodOrOptions + ' does not exist on jQuery.niTree');
        }
    };

})(jQuery);

/*

 For test
 */

function subTreeData(){
    return [
        {
            label: 'sub_tree_Node0',
            id: 'sub_tree_node0',
            attributes: {
                'class': ['class_node0_a', 'class_node0_b', 'red_node'],
                'data-type': 'site_brand_list'
            },
            children: [
                {
                    label: 'sub_tree_Node0_1',
                    id: 'sub_tree_node0_1',
                    attributes: {
                        'class': ['class_node0_1_a', 'class_node0_1_b', 'bold'],
                        'data-type': 'site_brand_list_child'
                    },
                    children: [
                        {
                            label: 'sub_tree_Node0_1_1',
                            id: 'sub_tree_node0_1_1',
                            attributes: {
                                'class': ['class_node0_1_1_a', 'class_node0_1_1_b'],
                                'data-type': 'site_brand_list_child'
                            }
                        }
                    ]
                }
            ]
        },
        {
            label: 'sub_tree_Node1',
            id: 'sub_tree_node1',
            attributes: {
                'class': ['class_node1_a', 'class_node1_b'],
                'data-type': 'site_brand_list'
            },
            children: [
                {
                    label: 'sub_tree_Node1_1',
                    id: 'sub_tree_node1_1',
                    attributes: {
                        'class': ['class_node1_1_a', 'class_node1_1_b', 'red_node'],
                        'data-type': 'site_brand_list_child'
                    },
                    children: [
                        {
                            label: 'sub_tree_Node1_1_1',
                            id: 'sub_tree_node1_1_1',
                            attributes: {
                                'class': ['class_node1_1_1_a', 'class_node1_1_1_b', 'ni_tree_no_checkbox'],
                                'data-type': 'site_brand_list_child'
                            }
                        },
                        {
                            label: 'sub_tree_Node1_1_2',
                            id: 'sub_tree_node1_1_2',
                            attributes: {
                                'class': ['class_node1_1_2_a', 'class_node1_1_2_b', 'ni_tree_no_checkbox'],
                                'data-type': 'site_brand_list_child'
                            }
                        }
                    ]
                },
                {
                    label: 'sub_tree_Node1_2',
                    id: 'sub_tree_node1_2',
                    attributes: {
                        'class': ['class_node1_2_a', 'class_node1_2_b', 'ni_tree_init_checked'],
                        'data-type': 'site_brand_list_child'
                    },
                    children: [
                        {
                            label: 'sub_tree_Node1_2_1',
                            id: 'sub_tree_node1_2_1',
                            attributes: {
                                'class': ['class_node1_2_1_a', 'class_node1_2_1_b'],
                                'data-type': 'site_brand_list_child'
                            }
                        },
                        {
                            label: 'sub_tree_Node1_2_2',
                            id: 'sub_tree_node1_2_2',
                            attributes: {
                                'class': ['class_node1_2_2_a', 'class_node1_2_2_b'],
                                'data-type': 'site_brand_list_child'
                            }
                        }
                    ]
                }
            ]
        }
    ];
}