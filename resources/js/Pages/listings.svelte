<script lang="ts">
    import { Link } from '@inertiajs/svelte';

    export let listings;
</script>

<svelte:head>
    <title>{listings.length} Listings | Generic ChatApp</title>
</svelte:head>

<ul>
{#each listings as listing}
    <li>
        <h1><Link href="/listing/{listing.id}">{listing.title}</Link></h1>
        <p>{listing.description}</p>
    </li>
{/each}
</ul>