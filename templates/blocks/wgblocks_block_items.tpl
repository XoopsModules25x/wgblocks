<ul class="nav nav-pills nav-stacked">
    <{foreach item=item from=$block|default:''}>
        <li class="li-wgblocks <{if isset($item.highlight) && $item.highlight}>active<{/if}>">
            <{$item.content}>
        </li>
    <{/foreach}>
</ul>
