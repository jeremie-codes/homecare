@extends('layouts.app')

@section('title', 'CONFIG')

@section('content')
<div class="mx-auto max-w-(--breakpoint-2xl) p-4 md:p-6" x-data="{ preview: null }">
  <!-- Breadcrumb Start -->
  <div x-data="{ pageName: `Configuration`}">
    <div class="flex flex-wrap items-center justify-between gap-3 pb-6">
      <h2 class="text-xl font-semibold text-gray-800 dark:text-white/90" x-text="pageName"></h2>
      <nav>
        <ol class="flex items-center gap-1.5">
          <li>
            <a class="inline-flex items-center gap-1.5 text-sm text-gray-500 dark:text-gray-400"
              href="{{ route(Auth::user()->getDashboard()) }}">
              Dashboard
              <svg class="stroke-current" width="17" height="16" viewBox="0 0 17 16" fill="none"
                xmlns="http://www.w3.org/2000/svg">
                <path d="M6.0765 12.667L10.2432 8.50033L6.0765 4.33366" stroke="" stroke-width="1.2"
                  stroke-linecap="round" stroke-linejoin="round" />
              </svg>
            </a>
          </li>
          <li class="text-sm text-gray-800 dark:text-white/90" x-text="pageName"></li>
        </ol>
      </nav>
    </div>
  </div>
  <!-- Breadcrumb End -->

  <div class="rounded-2xl border border-gray-200 bg-white p-5 lg:p-6 dark:border-gray-800 dark:bg-white/[0.03]">
    <h3 class="mb-5 text-lg font-semibold text-gray-800 lg:mb-7 dark:text-white/90">
      Paramètre de connexion
    </h3>

    <div class="mb-6 rounded-2xl border border-gray-200 p-5 lg:p-6 dark:border-gray-800">
      <div class="flex flex-col gap-5 xl:flex-row xl:items-center xl:justify-between">
        <div class="flex w-full flex-col items-center gap-6 xl:flex-row">
          <div class="relative">
            <div class="h-20 w-20 overflow-hidden rounded-full border border-gray-200 dark:border-gray-800">
              <img src="{{ asset($user->getAvatar()) }}" alt="user" />
            </div>
            <button @click="isProfileInfoModal = true" style="bottom: -5px; right: -15px;"
              class="shadow-theme-xs absolute flex w-full items-center justify-center rounded-full border border-gray-300 bg-white p-3 text-sm font-medium text-gray-700 hover:bg-gray-50 hover:text-gray-800 lg:inline-flex lg:w-auto dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-white/[0.03] dark:hover:text-gray-200">
              <i class='bxr  bx-camera'  ></i> 
            </button>
          </div>
          <div class="order-3 xl:order-2">
            <h4 class="mb-2 text-center text-lg font-semibold text-gray-800 xl:text-left dark:text-white/90">
              {{ $user->getFullName() }}
            </h4>
            <div class="flex flex-col items-center gap-1 text-center xl:flex-row xl:gap-3 xl:text-left">
              <p class="text-sm text-gray-500 dark:text-gray-400">
                {{ $user->role }}
              </p>
              <div class="hidden h-3.5 w-px bg-gray-300 xl:block dark:bg-gray-700"></div>
              <p class="text-sm text-gray-500 dark:text-gray-400">
                {{ $user->email }}
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="mb-6 rounded-2xl border border-gray-200 p-5 lg:p-6 dark:border-gray-800">
      <div class="flex flex-col gap-6 lg:flex-row lg:items-start lg:justify-between ">
        <form action="" method="post" class="w-full">
          @csrf
          <h4 class="text-lg font-semibold text-gray-800 lg:mb-6 dark:text-white/90 ">
            Information de l'utilisateur
          </h4>

          <div class="grid grid-cols-1 gap-4 lg:grid-cols-2 lg:gap-7 2xl:gap-x-32">
            <div class="col-span-1">
              <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                Prénom
              </label>
              <input type="text" placeholder="Entrez votre Prénom" value="{{ $user->firstname }}"
                class="dark:bg-dark-900 h-11 w-full rounded-lg border border-gray-300 bg-transparent bg-none px-4 py-2.5 text-sm text-gray-800 shadow-theme-xs placeholder:text-gray-400 focus:border-brand-300 focus:outline-hidden focus:ring-3 focus:ring-brand-500/10 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30 dark:focus:border-brand-800" />
            </div>

            <div class="col-span-1">
              <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                Nom
              </label>
              <input type="text" placeholder="Entrez votre Nom" value="{{ $user->lastname }}"
                class="dark:bg-dark-900 h-11 w-full rounded-lg border border-gray-300 bg-transparent bg-none px-4 py-2.5 text-sm text-gray-800 shadow-theme-xs placeholder:text-gray-400 focus:border-brand-300 focus:outline-hidden focus:ring-3 focus:ring-brand-500/10 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30 dark:focus:border-brand-800" />
            </div>

            <div class="col-span-1">
              <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                Email
              </label>
              <input type="email" placeholder="Entrez votre mail" value="{{ $user->email }}"
                class="dark:bg-dark-900 h-11 w-full rounded-lg border border-gray-300 bg-transparent bg-none px-4 py-2.5 text-sm text-gray-800 shadow-theme-xs placeholder:text-gray-400 focus:border-brand-300 focus:outline-hidden focus:ring-3 focus:ring-brand-500/10 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30 dark:focus:border-brand-800" />
            </div>
          </div>

          <div class="flex justify-end align-items-center pt-5">
            <button @click="isProfileInfoModal = true"
              class="shadow-theme-xs flex w-full self-end items-center justify-center gap-2 rounded-lg border border-gray-300 bg-blue-light-500 px-4 py-3 text-sm font-medium hover:bg-blue-light-600 text-white lg:inline-flex lg:w-auto dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-white/[0.03] dark:hover:text-gray-200">
              <i class='bxr  bx-check'  ></i> 
              Valider
            </button>
          </div>
        </form>
      </div>
    </div>      

    <div class="mb-6 rounded-2xl border border-gray-200 p-5 lg:p-6 dark:border-gray-800">
      <div class="flex flex-col gap-6 lg:flex-row lg:items-start lg:justify-between ">
        <form action="" method="post" class="w-full">
          <h4 class="text-lg font-semibold text-gray-800 lg:mb-6 dark:text-white/90 ">
            Mot de passe
          </h4>

          <div class="grid grid-cols-1 gap-4 lg:grid-cols-2 lg:gap-7 2xl:gap-x-32">
            <div class="col-span-1">
              <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                Ancien mot de passe
              </label>
              <input type="password" placeholder="Entrez votre Password Actuel"
                class="dark:bg-dark-900 h-11 w-full rounded-lg border border-gray-300 bg-transparent bg-none px-4 py-2.5 text-sm text-gray-800 shadow-theme-xs placeholder:text-gray-400 focus:border-brand-300 focus:outline-hidden focus:ring-3 focus:ring-brand-500/10 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30 dark:focus:border-brand-800" />
            </div>

            <div class="col-span-1">
              <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                Nouveau mot de passe
              </label>
              <input type="password" placeholder="Entrez votre Nouvea Password"
                class="dark:bg-dark-900 h-11 w-full rounded-lg border border-gray-300 bg-transparent bg-none px-4 py-2.5 text-sm text-gray-800 shadow-theme-xs placeholder:text-gray-400 focus:border-brand-300 focus:outline-hidden focus:ring-3 focus:ring-brand-500/10 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30 dark:focus:border-brand-800" />
            </div>
          </div>

          <div class="flex justify-end align-items-center pt-8">
            <button @click="isProfileInfoModal = true"
              class="shadow-theme-xs flex w-full self-end items-center justify-center gap-2 rounded-lg border border-gray-300 bg-blue-light-500 px-4 py-3 text-sm font-medium hover:bg-blue-light-600 text-white lg:inline-flex lg:w-auto dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-white/[0.03] dark:hover:text-gray-200">
              <i class='bxr  bx-check'  ></i> 
              Valider
            </button>
          </div>
        </form>
      </div>
    </div>      
  </div>
</div>

@endsection
