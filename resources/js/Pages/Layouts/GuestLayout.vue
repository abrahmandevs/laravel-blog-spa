<script setup>
import { ref, defineProps } from "vue";
import { Link, usePage } from "@inertiajs/vue3";

import {
    Disclosure,
    DisclosureButton,
    DisclosurePanel,
    Menu,
    MenuButton,
    MenuItem,
    MenuItems,
} from "@headlessui/vue";
import { Bars3Icon, BellIcon, XMarkIcon } from "@heroicons/vue/24/outline";

const data = usePage();
const user = data.props.flash.auth;

const props = defineProps({
    user: {
        type: Object,
        default: null,
    },

});
const status = ref([]);

const navigation = [
    { name: "Dashboard", href:"home", method:"get", current: true },
    { name: "Home", href:"/", method:"get", current: false },
    { name: "Delete", href:"account/delete",  current: false },
    { name: "Register", href:"register", method:"get", current: false },
    { name: "Rest password", href:"reset-password", method:"post", current: false },
];
</script>

<template>
    <Disclosure as="nav" class="bg-gray-800" v-slot="{ open }">
        <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
            <div class="relative flex h-16 items-center justify-between text-white">
                <div
                    class="absolute inset-y-0 left-0 flex items-center sm:hidden"
                >
                    <!-- Mobile menu button-->
                    <DisclosureButton
                        class="relative inline-flex items-center justify-center rounded-md p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white"
                    >
                        <span class="absolute -inset-0.5" />
                        <span class="sr-only">Open main menu</span>
                        <Bars3Icon
                            v-if="!open"
                            class="block h-6 w-6"
                            aria-hidden="true"
                        />
                        <XMarkIcon
                            v-else
                            class="block h-6 w-6"
                            aria-hidden="true"
                        />
                    </DisclosureButton>
                </div>
                <div
                    class="flex flex-1 items-center justify-center sm:items-stretch sm:justify-start"
                >
                    <div class="flex flex-shrink-0 items-center">Logo</div>
                    <div class="hidden sm:ml-6 sm:block">
                        <div class="flex space-x-4">
                            <Link
                                v-for="item in navigation"
                                :key="item.name"
                                :href="item.href"
                                :method="item.method"
                                :as="item.type?? 'a'"
                                >{{ item.name }}</Link
                            >
                        </div>
                    </div>
                </div>
                <div
                    class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0"
                >
                    <button
                        type="button"
                        class="relative rounded-full bg-gray-800 p-1 text-gray-400 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800"
                    >
                        <span class="absolute -inset-1.5" />
                        <span class="sr-only">View notifications</span>
                        <BellIcon class="h-6 w-6" aria-hidden="true" />
                    </button>

                    <!-- Profile dropdown -->
                    <Menu v-if="user" as="div" class="relative ml-3">
                        <div>
                            <MenuButton
                                class="text-white relative flex rounded-full bg-gray-800 text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800"
                            >
                                <span class="absolute -inset-1.5" />
                                <span class="sr-only">Open user menu</span>
                                {{ user.name }}
                            </MenuButton>
                        </div>
                        <transition
                            enter-active-class="transition ease-out duration-100"
                            enter-from-class="transform opacity-0 scale-95"
                            enter-to-class="transform opacity-100 scale-100"
                            leave-active-class="transition ease-in duration-75"
                            leave-from-class="transform opacity-100 scale-100"
                            leave-to-class="transform opacity-0 scale-95"
                        >
                            <MenuItems
                                class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
                            >
                                <MenuItem v-slot="{ active }">
                                    <Link
                                        :href="route('account.delete')"
                                        method="get"
                                        as="button"
                                        :class="[
                                            active ? 'bg-gray-100' : '',
                                            'block px-4 py-2 text-sm text-gray-700',
                                        ]"
                                        >Account Delete</Link>
                                </MenuItem>
                                <MenuItem v-slot="{ active }">
                                    <a
                                        href="#"
                                        :class="[
                                            active ? 'bg-gray-100' : '',
                                            'block px-4 py-2 text-sm text-gray-700',
                                        ]"
                                        >Settings</a
                                    >
                                </MenuItem>
                                <MenuItem v-slot="{ active }">
                                    <Link
                                        href="/logout"
                                        method="post"
                                        as="button"
                                        type="button"
                                        :class="[
                                            active ? 'bg-gray-100' : '',
                                            ' w-full text-start block px-4 py-2 text-sm text-gray-700',
                                        ]"
                                        >Logout</Link
                                    >
                                </MenuItem>
                            </MenuItems>
                        </transition>
                    </Menu>
                    <Link
                        v-if="!user"
                        class="border-bottom border-2 border-success text-secondary fw-medium"
                        :href="route('login')"
                        >Login</Link
                    >
                    <!-- {{ user }} -->

                </div>

            </div>
        </div>

        <DisclosurePanel class="sm:hidden">
            <div class="space-y-1 px-2 pb-3 pt-2">
                <DisclosureButton
                    v-for="item in navigation"
                    :key="item.name"
                    as="a"
                    :href="item.href"
                    :class="[
                        item.current
                            ? 'bg-gray-900 text-white'
                            : 'text-gray-300 hover:bg-gray-700 hover:text-white',
                        'block rounded-md px-3 py-2 text-base font-medium',
                    ]"
                    :aria-current="item.current ? 'page' : undefined"
                    >{{ item.name }}</DisclosureButton
                >
            </div>
        </DisclosurePanel>
    </Disclosure>

    <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8 bg-gray-200 h-full">
        <slot> </slot>
        {{user}}
    </div>
</template>

<style></style>
