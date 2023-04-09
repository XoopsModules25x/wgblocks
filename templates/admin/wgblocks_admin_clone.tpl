<!-- Header -->
<{include file='db:wgblocks_admin_header.tpl' }>

<{if isset($form)}>
    <{$form|default:false}>
<{/if}>
<{if $result|default:''}>
    <{$result|default:false}>
<{/if}>
<{if isset($error)}>
    <div class="errorMsg"><strong><{$error|default:false}></strong></div>
<{/if}>

<!-- Footer -->
<{include file='db:wgblocks_admin_footer.tpl' }>
