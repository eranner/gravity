@include('partials.header')
@include('partials.navbar')
<script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>

<div id="app" class="container">
    <h2>Build Your Order</h2>

    <select v-model="selectedFlavor">
        @foreach ($flavors as $flavor)
            <option value="{{ $flavor->flavor }}">{{ $flavor->flavor }}</option>
        @endforeach
    </select>

    <div class="finalOrder">
        <input type="text" v-model="selectedFlavor">
    </div>
</div>

@include('partials.footer')

<script>
    const app = Vue.createApp({
        data() {
            return {
                selectedFlavor: '' // Vue data property to store the selected flavor
            };
        }
    });

    app.mount('#app');
</script>
