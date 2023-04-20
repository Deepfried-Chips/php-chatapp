<script>
    import { onMount } from 'svelte';
    import { Link } from '@inertiajs/svelte'

    onMount(() => {
        console.log("wawa");
    });
</script>

<svelte:head>
    <title>Wawa</title>
</svelte:head>

<h1 class="text-3xl font-bold">
    Wawa
</h1>

<Link href="/">Home</Link>