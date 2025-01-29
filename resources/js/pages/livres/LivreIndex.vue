<template>
    <loader_card_overlay :loading="loading">
        <div class="mb-5 mb-xl-8">
            <div
                class="card-header border-0 pt-5 d-flex justify-content-between align-items-center"
            >
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label fw-bold fs-3 mb-1">Livres</span>
                </h3>
                <div class="d-flex align-items-center">
                    <router-link
                        to="/livres/create"
                        class="btn btn-sm btn-dark"
                        title="Ajouter un livre"
                    >
                        <i class="fa-solid fa-plus"></i>
                        Ajouter un livre
                    </router-link>
                </div>
            </div>
            <section class="m-5">
                <div class="row">
                    <div
                        class="col-sm-12 col-md-6 col-lg-4 mb-4"
                        v-for="livre in livres"
                    >
                        <div
                            @click.prevent="showModal(livre.id)"
                            class="card text-dark card-has-bg"
                            :style="{
                                backgroundImage: `url(${
                                    livre.image
                                        ? livre.image
                                        : base_url +
                                          'assets/img/default_author.jpg'
                                })`,
                            }"
                        >
                            <img
                                class="card-img d-none"
                                src="https://source.unsplash.com/600x900/?tech,street"
                                alt="Creative Manner Design Lorem Ipsum Sit Amet Consectetur dipisi?"
                            />
                            <div class="card-img-overlay d-flex flex-column">
                                <div class="card-body">
                                    <small class="card-meta mb-2">
                                        Type de roman
                                    </small>
                                    <h4 class="card-title mt-0">
                                        <a class="text-dark">
                                            {{
                                                livre.titre.length > 45
                                                    ? livre.titre.substring(
                                                          0,
                                                          45
                                                      ) + "..."
                                                    : livre.titre
                                            }}
                                        </a>
                                    </h4>
                                    <small>
                                        <i class="far fa-clock"></i>
                                        Date de parution
                                    </small>
                                </div>
                                <div class="card-footer">
                                    <div class="media">
                                        <img
                                            class="mr-3 rounded-circle"
                                            :src="
                                                livre.auteur.image
                                                    ? livre.auteur.image
                                                    : base_url +
                                                      'assets/img/default_author.jpg'
                                            "
                                            :alt="livre.auteur.nom"
                                            style="
                                                width: 50px;
                                                height: 50px;
                                                object-fit: cover;
                                            "
                                        />
                                        <div class="media-body">
                                            <h6 class="my-0 text-dark d-block">
                                                {{ livre.auteur.nom }}
                                            </h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </loader_card_overlay>
    <ModalLivreShow
        v-if="show_modal"
        :livre_id="livre_id"
        v-on:hideModal="hideModal"
    >
    </ModalLivreShow>
</template>

<script setup>
import { onMounted, ref, inject } from "vue";
import ModalLivreShow from "@/pages/livres/ModalLivreShow.vue";

/*
 * Variables
 */
const base_url = inject("base_url");

let loading = ref(true);
const livres = ref([]);
const livre_id = ref(null);
const show_modal = ref(false);

/*
 * Fonctions
 */
const showModal = (id) => {
    livre_id.value = id;
    show_modal.value = true;
};

const hideModal = () => {
    show_modal.value = false;
};

const getData = () => {
    loading.value = true;

    axios
        .get(base_url + "api/livres")
        .then((response) => response.data)
        .then((data) => {
            livres.value = data.livres;
        })
        .catch((error) => {
            console.log(error);
        })
        .finally(() => {
            loading.value = false;
        });
};

/*
 * Mounted
 */
onMounted(() => {
    getData();
});
</script>

<style scoped>
.card {
    border: none;
    /* transition: all 500ms cubic-bezier(0.19, 1, 0.22, 1); */
    overflow: hidden;
    border-radius: 20px;
    min-height: 450px;
    box-shadow: 0 0 12px 0 rgba(0, 0, 0, 0.2);

    @media (max-width: 768px) {
        min-height: 350px;
    }

    @media (max-width: 420px) {
        min-height: 300px;
    }

    &.card-has-bg {
        transition: all 500ms cubic-bezier(0.19, 1, 0.22, 1);
        background-size: 120%;
        background-repeat: no-repeat;
        background-position: center center;
        &:before {
            content: "";
            position: absolute;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            background: inherit;
            -webkit-filter: grayscale(1);
            -moz-filter: grayscale(100%);
            -ms-filter: grayscale(100%);
            -o-filter: grayscale(100%);
            filter: grayscale(100%);
        }

        &:hover {
            transform: scale(0.98);
            box-shadow: 0 0 5px -2px rgba(0, 0, 0, 0.3);
            /* background-size: 130%; */
            transition: all 500ms cubic-bezier(0.19, 1, 0.22, 1);

            .card-img-overlay {
                /* transition: all 800ms cubic-bezier(0.19, 1, 0.22, 1); */
                background: rgb(255, 186, 33);
                background: linear-gradient(
                    0deg,
                    rgba(255, 186, 33, 0.5) 0%,
                    rgba(255, 186, 33, 1) 100%
                );
            }
        }
    }
    .card-footer {
        background: none;
        border-top: none;
        .media {
            img {
                border: solid 3px rgba(255, 255, 255, 0.3);
            }
        }
    }
    .card-title {
        font-weight: 800;
    }
    .card-meta {
        color: rgba(0, 0, 0, 0.3);
        text-transform: uppercase;
        font-weight: 500;
        letter-spacing: 2px;
    }
    .card-body {
        transition: all 500ms cubic-bezier(0.19, 1, 0.22, 1);
    }
    &:hover {
        .card-body {
            transition: all 800ms cubic-bezier(0.19, 1, 0.22, 1);
        }
        cursor: pointer;
        transition: all 800ms cubic-bezier(0.19, 1, 0.22, 1);
    }
    .card-img-overlay {
        transition: all 800ms cubic-bezier(0.19, 1, 0.22, 1);
        background: rgb(255, 186, 33);
        background: linear-gradient(
            0deg,
            rgba(255, 186, 33, 0.3785889355742297) 0%,
            rgba(255, 186, 33, 1) 100%
        );
    }
}
</style>
