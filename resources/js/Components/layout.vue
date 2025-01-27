<script setup></script>

<template>
    <div>
        <nav class="navbar navbar-dark bg-dark navbar-expand-lg">
            <div class="container">
                <router-link class="navbar-brand" aria-current="page" to="/">
                    <i class="fas fa-book-bookmark"></i> Introduction à Laravel
                    et Vue.js
                </router-link>
                <!-- Burger Button -->
                <button
                    class="navbar-toggler"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#navbarNav"
                    aria-controls="navbarNav"
                    aria-expanded="false"
                    aria-label="Toggle navigation"
                >
                    <span class="navbar-toggler-icon"></span>
                </button>
                <!-- Menu Links -->
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <router-link
                                class="nav-link active"
                                aria-current="page"
                                to="/"
                            >
                                Accueil
                            </router-link>
                        </li>
                        <li class="nav-item">
                            <router-link class="nav-link active" to="/auteurs">
                                Auteur
                            </router-link>
                        </li>
                        <li class="nav-item">
                            <router-link class="nav-link active" to="/livres">
                                Livre
                            </router-link>
                        </li>
                        <li class="nav-item">
                            <button
                                type="button"
                                class="btn btn-outline-light"
                                href="#"
                            >
                                <i class="fas fa-user"></i> Connexion
                            </button>
                            <a></a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container">
            <router-view></router-view>
        </div>
    </div>
</template>
