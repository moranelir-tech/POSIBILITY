document.addEventListener('DOMContentLoaded', () => {
    const trigger = document.getElementById('ma-trigger-btn');
    const menu = document.getElementById('ma-accessibility-menu');

    // פתיחה/סגירה
    trigger.addEventListener('click', () => {
        menu.classList.toggle('active');
    });

    // טעינת הגדרות קודמות מ-LocalStorage
    const saved = JSON.parse(localStorage.getItem('ma_settings')) || [];
    saved.forEach(cls => document.body.classList.add('ma-' + cls));

    window.maApply = function(type) {
        if (type === 'reset') {
            document.body.className = document.body.className.replace(/\bma-\S+/g, '');
            localStorage.removeItem('ma_settings');
            return;
        }

        const className = 'ma-' + type;
        document.body.classList.toggle(className);

        // שמירה במחסן המקומי
        let currentSettings = JSON.parse(localStorage.getItem('ma_settings')) || [];
        if (document.body.classList.contains(className)) {
            if (!currentSettings.includes(type)) currentSettings.push(type);
        } else {
            currentSettings = currentSettings.filter(item => item !== type);
        }
        localStorage.setItem('ma_settings', JSON.stringify(currentSettings));
    };
});
