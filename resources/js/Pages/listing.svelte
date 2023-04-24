<script>
    export let listing;
</script>

<svelte:head>
    <title>{listing.title} | Generic ChatApp</title>
</svelte:head>

<nav>
    <a href="/listings" class="text-sky-800 hover:underline">Back to listings</a>
</nav>

<div>
    <h1 class="font-bold text-3xl mt-2 mb-2">{listing.title}</h1>
    <p class="text-xl">{listing.description}</p>
</div>