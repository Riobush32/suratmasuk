
<div class="rounded-xl overflow-hidden border-white border mt-3">
    <div id="toolbar" class="bg-slate-400">
        <!-- Add font size dropdown -->
        <!-- Format teks -->
        <button class="ql-bold"></button> <!-- Bold -->
        <button class="ql-italic"></button> <!-- Italic -->
        <button class="ql-underline"></button> <!-- Underline -->
        <button class="ql-strike"></button> <!-- Strike -->

        <!-- Blockquote dan Code Block -->
        <button class="ql-blockquote"></button> <!-- Blockquote -->
        <button class="ql-code-block"></button> <!-- Code Block -->

        <!-- Link, Image, Video, Formula -->
        {{-- <button class="ql-link"></button> <!-- Link -->
    <button class="ql-image"></button> <!-- Image -->
    <button class="ql-video"></button> <!-- Video -->
    <button class="ql-formula"></button> <!-- Formula --> --}}

        <!-- Header -->
        <button class="ql-header" value="1"></button> <!-- Header 1 -->
        <button class="ql-header" value="2"></button> <!-- Header 2 -->

        <!-- List -->
        <button class="ql-list" value="ordered"></button> <!-- Ordered List -->
        <button class="ql-list" value="bullet"></button> <!-- Bullet List -->
        <button class="ql-list" value="check"></button> <!-- Checklist -->

        <!-- Superscript / Subscript -->
        <button class="ql-script" value="sub"></button> <!-- Subscript -->
        <button class="ql-script" value="super"></button> <!-- Superscript -->

        <!-- Indent -->
        <button class="ql-indent" value="-1"></button> <!-- Outdent -->
        <button class="ql-indent" value="+1"></button> <!-- Indent -->

        <!-- Text Direction -->
        <button class="ql-direction" value="rtl"></button> <!-- Right-to-Left -->

        <!-- Size -->
        <select class="ql-size">
            <option value="small"></option> <!-- Small -->
            <option selected></option> <!-- Normal -->
            <option value="large"></option> <!-- Large -->
            <option value="huge"></option> <!-- Huge -->
        </select>


        <!-- Header Dropdown -->
        <select class="ql-header">
            <option selected></option> <!-- Normal -->
            <option value="1"></option> <!-- Header 1 -->
            <option value="2"></option> <!-- Header 2 -->
            <option value="3"></option> <!-- Header 3 -->
            <option value="4"></option> <!-- Header 4 -->
            <option value="5"></option> <!-- Header 5 -->
            <option value="6"></option> <!-- Header 6 -->
        </select>

        <!-- Color and Background -->
        <select class="ql-color"></select> <!-- Text Color -->
        <select class="ql-background"></select> <!-- Background Color -->

        <!-- Font -->
        <select class="ql-font"></select> <!-- Font Family -->

        <!-- Alignment -->
        <select class="ql-align">
            <option selected></option> <!-- Default (left) -->
            <option value="center"></option> <!-- Center -->
            <option value="right"></option> <!-- Right -->
            <option value="justify"></option> <!-- Justify -->
        </select>

        <!-- Remove Formatting -->
        <button class="ql-clean"></button> <!-- Clean Formatting -->
    </div>
    <div id="editor" class="min-h-56 text-white"></div>
</div>
<textarea id="editorContent" name="editor_content" style="display: none;"></textarea>

<!-- Muat file JS -->
@vite(['resources/js/editor.js'])
