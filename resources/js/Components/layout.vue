<script setup></script>

<template>
    <div>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
                <a class="navbar-brand" href="#">
                    <i class="fas fa-book-bookmark"></i> Introduction à Laravel
                    et Vue.js
                </a>
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
                            <a
                                class="nav-link active"
                                aria-current="page"
                                href="#"
                                >Accueil</a
                            >
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Auteur</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Article</a>
                        </li>
                        <li class="nav-item">
                            <button
                                type="button"
                                class="btn btn-outline-secondary"
                                href="#"
                            >
                                <i class="fas fa-user"></i> Login
                            </button>
                            <a></a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</template>

<style></style>
