@extends('layouts.app')

@section('content')
    <template v-if="menu==0">
        {{-- <mostrar-persona></mostrar-persona> --}}
    </template>

    <template v-if="menu==1">
        <persona-component></persona-component>
    </template>

    <template v-if="menu==2">
      <crear-persona></crear-persona>
    </template>

    <template v-if="menu==3">
        <h1 class="text-center">Tesoreria</h1>
    </template>

    <template v-if="menu==4">
        <h1 class="text-center">Otra cosa</h1>
    </template>

    <template v-if="menu==5">
        <h1 class="text-center">Informes</h1>
    </template>

    <template v-if="menu==6">
      <h1 class="text-center">una cosa</h1>
    </template>

    <template v-if="menu==7">
      <h1 class="text-center">talento humano</h1>
    </template>

    <template v-if="menu==8">
      <h1 class="text-center">Archivo</h1>
    </template>

    <template v-if="menu==20">
      <h2>otro menu</h2>
    </template>

    <div id="dock-container">
        <div id="dock">
            <ul>
                <li @click="menu=1">
                    <span>Comuneros</span>
                    <a href="#"><img src="{{ asset('img/icon-1.png') }}"/></a>
                </li>
                <li @click="menu=2">
                    <span>Crear nuevo comunero</span>
                    <a href="#"><img src="{{ asset('img/icon-2.png') }}"/></a>
                </li>
                <li @click="menu=3">
                    <span>Tesoreria</span>
                    <a href="#"><img src="{{ asset('img/icon-3.png') }}"/></a>
                </li>
                <li @click="menu=4">
                    <span>Facturacion</span>
                    <a href="#"><img src="{{ asset('img/icon-4.png') }}"/></a>
                </li>
                <li @click="menu=5">
                    <span>Informes</span>
                    <a href="#"><img src="{{ asset('img/icon-5.png') }}"/></a>
                </li>
                <li @click="menu=6">
                    <span>Otros</span>
                    <a href="#"><img src="{{ asset('img/icon-6.png') }}"/></a>
                </li>
                <li @click="menu=7">
                    <span>Talento humano</span>
                    <a href="#"><img src="{{ asset('img/icon-7.png') }}"/></a>
                </li>
                <li @click="menu=8">
                    <span>Archivo</span>
                    <a href="#"><img src="{{ asset('img/icon-8.png') }}"/></a>
                </li>
                <li @click="menu=20">
                    <span>Entidad</span>
                    <a href="#"><img src="{{ asset('img/icon-x.png') }}"/></a>
                </li>
            </ul>
        </div>
    </div>
@endsection
