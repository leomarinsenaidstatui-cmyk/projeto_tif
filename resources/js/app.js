$(function () {
    const themeStorageKey = 'tif.theme';
    const supportedThemes = ['auto', 'light', 'dark', 'dim', 'grape', 'choco'];
    const documentElement = document.documentElement;

    const setTheme = (theme) => {
        if (theme === 'auto') {
            documentElement.removeAttribute('data-theme');
        } else {
            documentElement.setAttribute('data-theme', theme);
        }
    };

    let selectedTheme = 'auto';

    try {
        const savedTheme = localStorage.getItem(themeStorageKey);

        if (supportedThemes.includes(savedTheme)) {
            selectedTheme = savedTheme;
        }
    } catch {
        // Theme selection still works when local storage is unavailable.
    }

    $(`#theme-${selectedTheme}`).prop('checked', true);
    setTheme(selectedTheme);

    $('#theme-switcher').on('input', 'input[name="theme"]', function () {
        selectedTheme = this.value;
        setTheme(selectedTheme);

        try {
            localStorage.setItem(themeStorageKey, selectedTheme);
        } catch {
            // Saving the preference is optional.
        }
    });
});
