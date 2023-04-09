<ul class="nav nav-pills nav-stacked">
    <{if isset($block)}>
        <{foreach item=item from=$block}>
            <li class="li-wgblocks <{if isset($item.highlight) && $item.highlight}>active<{/if}>">
                <{$item.content}>
            </li>
        <{/foreach}>
    <{/if}>
</ul>

