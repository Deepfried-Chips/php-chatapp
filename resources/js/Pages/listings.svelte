<script>
    import { Link } from '@inertiajs/svelte';

    export let listings;
</script>

<svelte:head>
    <title>{listings.length} {listings.length ? "Listing" : "Listings"} | Generic ChatApp</title>
</svelte:head>

<ul>
{#each listings as listing}
    <li>
        <h1 class="text-3xl font-bold text-sky-800 hover:underline"><Link href="/listing/{listing.id}">{listing.title}</Link></h1>
        <p class="text-xl">{listing.description}</p>
    </li>
{/each}
</ul>