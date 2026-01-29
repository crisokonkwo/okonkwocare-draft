<?php
/**
 * Template part: Membership Who It's For Section
 */
?>

<section class="bg-white border-b border-slate-200">
  <div class="mx-auto max-w-7xl px-4 py-10 md:py-10">
    <div class="grid gap-8 lg:grid-cols-3">
      <div class="lg:col-span-1">
        <h2 class="text-2xl font-extrabold tracking-tight text-slate-900 sm:text-3xl">
          Who this is for
        </h2>
        <p class="mt-3 text-base leading-7 text-slate-700">
          Families who want time, continuity, and a clear plan without feeling rushed.
        </p>
      </div>

      <div class="lg:col-span-2 grid gap-5 sm:grid-cols-2">
        <?php
        $benefits = [
          'Families seeking longer, unrushed visits',
          'Children with complex or chronic concerns',
          'Parents who value direct physician access',
          'ADHD and executive-function support',
          'Coordinated care and follow-up planning',
          'A calmer, relationship-based care model',
        ];
        
        foreach ($benefits as $benefit):
        ?>
          <div class="rounded-2xl border border-slate-200 bg-slate-50 p-5">
            <div class="flex items-start gap-3">
              <svg class="mt-0.5 h-5 w-5 text-brand-700" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M12 22c5.523 0 10-4.477 10-10S17.523 2 12 2 2 6.477 2 12s4.477 10 10 10z"/><path d="m9 12 2 2 4-4"/></svg>
              <p class="text-sm leading-6 text-slate-700"><?php echo esc_html($benefit); ?></p>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</section>
