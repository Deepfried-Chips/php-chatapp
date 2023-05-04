<script>
  import { inertia } from '@inertiajs/svelte'
</script>

<main>
    <nav class="flex justify-between items-center mb-4">
      <a href="/"><img class="w-12 bg-slate-500" src="images/chipsblankie.png" alt=""/></a>
      <ul class="flex space-x-6 mr-6 text-lg">
        <li>
          <span class="font-bold ">
            Welcome
          </span>
        </li>
      </ul>
    </nav>
  <article>
    <slot />
  </article>
</main>