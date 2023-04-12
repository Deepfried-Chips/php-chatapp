<script>
    export let listing;
</script>

<svelte:head>
    <title>{listing.title} | Generic ChatApp</title>
</svelte:head>

<div>
    <h1>{listing.title}</h1>
    <p>{listing.description}</p>
</div>