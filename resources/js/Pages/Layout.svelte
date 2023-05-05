<script>
  import { page, router } from '@inertiajs/svelte'

  let values = {
    csrf_token: $page.props.csrf_token,
  }

  function submitLogout() {
    router.post('/logout', values)
  }

</script>

<main>
    <nav class="flex justify-between items-center mb-4 bg-sky-500">
      <a href="/"><img class="w-12 animate-spin" src="images/chipsblankie.png" alt=""/></a>
      <ul class="flex space-x-6 mr-6 text-lg">
        {#if $page.props.auth.user}
        <li>
          <img class="h-10 w-10 rounded-full" src={$page.props.auth.user.avatar} alt="profile avatar"/>
        </li>
        <li>
          <span class="font-bold">
            {$page.props.auth.user.name}
          </span>
        </li>
        <li>
          <form on:submit|preventDefault={submitLogout}>
            <button type="submit">
              Logout
            </button>
          </form>
        </li>
        {:else}
        <li>
          <a href="/register">Register</a>
        </li>
        <li>
          <a href="/login">Login</a>
        {/if}
      </ul>
    </nav>
  <article>
    <slot />
  </article>
</main>