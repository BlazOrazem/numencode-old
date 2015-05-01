{extends file='index.tpl'}
{block name=body}
    <div class="container-fluid">
        <h1>{$item->title}</h1>
        <section>
            {$item->content}
        </section>
    </div>
{/block}