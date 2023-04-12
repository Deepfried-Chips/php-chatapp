<script lang="ts">
    import { onMount } from 'svelte';
    import { Link } from '@inertiajs/svelte'

    onMount(() => {
        console.log("wawa");
    });
</script>

<svelte:head>
    <title>Wawa</title>
</svelte:head>

<h1>
    Wawa
</h1>

<Link href="/">Home</Link>