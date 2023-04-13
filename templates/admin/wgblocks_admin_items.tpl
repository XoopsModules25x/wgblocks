<!-- Header -->
<{include file='db:wgblocks_admin_header.tpl' }>

<{if isset($items_list)}>
    <table class='table table-bordered'>
        <thead>
            <tr class='head'>
                <th class="center"><{$smarty.const._AM_WGBLOCKS_ITEM_ID}></th>
                <th class="center"><{$smarty.const._AM_WGBLOCKS_ITEM_TYPE}></th>
                <th class="center"><{$smarty.const._AM_WGBLOCKS_ITEM_NAME}></th>
                <th class="center"><{$smarty.const._AM_WGBLOCKS_ITEM_TEXT}></th>
                <th class="center"><{$smarty.const._AM_WGBLOCKS_ITEM_FILE}></th>
                <th class="center"><{$smarty.const._AM_WGBLOCKS_ITEM_FUNC}></th>
                <th class="center"><{$smarty.const._AM_WGBLOCKS_ITEM_WEIGHT}></th>
                <th class="center"><{$smarty.const._AM_WGBLOCKS_ITEM_STATUS}></th>
                <th class="center"><{$smarty.const._AM_WGBLOCKS_ITEM_DATECREATED}></th>
                <th class="center"><{$smarty.const._AM_WGBLOCKS_ITEM_SUBMITTER}></th>
                <th class="center"><{$smarty.const._AM_WGBLOCKS_ITEM_BLOCKS}></th>
                <th class="center width5"><{$smarty.const._AM_WGBLOCKS_FORM_ACTION}></th>
            </tr>
        </thead>
        <{if isset($items_count) && $items_count > 0}>
        <tbody>
            <{foreach item=item from=$items_list}>
            <tr class='<{cycle values='odd, even'}>'>
                <td class='center'><{$item.id}></td>
                <td class='center'><{$item.type_text}></td>
                <td class='center'><{$item.name}></td>
                <td class='center'><{$item.text_short}></td>
                <td class='center'>
                    <{if isset($item.file_check) && $item.file_check != ''}>
                        <img src="<{$wgblocks_icons_url_16}>/<{$item.file_check}>" alt="filecheck">
                    <{/if}>
                    <{$item.file|default:''}>
                </td>
                <td class='center'>
                    <{if isset($item.func_check) && $item.func_check != ''}><img src="<{$wgblocks_icons_url_16}>/<{$item.func_check}>" alt="functioncheck"><{/if}>
                    <{$item.func|default:''}>
                </td>
                <td class='center'><{$item.weight}></td>
                <td class='center'>
                    <img src="<{$wgblocks_icons_url_16}>/status<{$item.status}>.png" alt="status">
                </td>
                <td class='center'><{$item.datecreated}></td>
                <td class='center'><{$item.submitter}></td>
                <td class='center'><{$item.usedBlocks}></td>
                <td class="center  width5">
                    <a href="items.php?op=edit&amp;item_id=<{$item.id}>&amp;start=<{$start}>&amp;limit=<{$limit}>" title="<{$smarty.const._EDIT}>"><img src="<{xoModuleIcons16 'edit.png'}>" alt="<{$smarty.const._EDIT}> items" ></a>
                    <a href="items.php?op=clone&amp;item_id_source=<{$item.id}>" title="<{$smarty.const._CLONE}>"><img src="<{xoModuleIcons16 'editcopy.png'}>" alt="<{$smarty.const._CLONE}> items" ></a>
                    <a href="items.php?op=delete&amp;item_id=<{$item.id}>" title="<{$smarty.const._DELETE}>"><img src="<{xoModuleIcons16 'delete.png'}>" alt="<{$smarty.const._DELETE}> items" ></a>
                </td>
            </tr>
            <{/foreach}>
        </tbody>
        <{/if}>
    </table>
    <div class="clear">&nbsp;</div>
    <{if !empty($pagenav)}>
        <div class="xo-pagenav floatright"><{$pagenav|default:false}></div>
        <div class="clear spacer"></div>
    <{/if}>
<{/if}>
<{if !empty($form)}>
    <{$form|default:false}>
<{/if}>
<{if !empty($error)}>
    <div class="errorMsg"><strong><{$error|default:false}></strong></div>
<{/if}>

<!-- Footer -->
<{include file='db:wgblocks_admin_footer.tpl' }>
