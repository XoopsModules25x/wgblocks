<ul class="nav nav-pills nav-stacked">
    <{foreach item=item from=$block|default:''}>
        <li class="li-wgblocks <{if $item.highlight|default:false}>active<{/if}>">
            <{$item.content}>
        </li>
    <{/foreach}>
</ul>
