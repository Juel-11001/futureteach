/**
 *
 * You can write your JS code here, DO NOT touch the default style file
 * because it will make it harder for you to update.
 * 
 */

"use strict";

function initializeCategoryForm() {
    const iconToggle = document.getElementById('iconToggle');
    const imageToggle = document.getElementById('imageToggle');
    const iconField = document.getElementById('iconField');
    const imageField = document.getElementById('imageField');

    if (!iconToggle || !imageToggle || !iconField || !imageField) {
        console.warn("Category form elements are not available on this page.");
        return;
    }

    // Default: Only Icon field is shown
    iconToggle.addEventListener('click', function () {
        iconField.style.display = 'block';
        imageField.style.display = 'none'; 
        iconToggle.classList.add('btn-primary');
        iconToggle.classList.remove('btn-secondary');
        imageToggle.classList.add('btn-secondary');
        imageToggle.classList.remove('btn-primary');
    });

    imageToggle.addEventListener('click', function () {
        iconField.style.display = 'block'; 
        imageField.style.display = 'block'; 
        imageToggle.classList.add('btn-primary');
        imageToggle.classList.remove('btn-secondary');
        iconToggle.classList.add('btn-secondary');
        iconToggle.classList.remove('btn-primary');
    });
}
