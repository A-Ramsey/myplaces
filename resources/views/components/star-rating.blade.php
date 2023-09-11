<div>
    @if ($isInput)
        <x-input-label for="star_rating" :value="__('Star Rating')" />
        <x-text-input id="star_rating" type="number" min="1" max="5" name="star_rating" class="mt-1 block w-full hidden" :value="old('star_rating')" autofocus autocomplete="star_rating" />
        <x-input-error class="mt-2" :messages="$errors->get('star_rating')" />
        @for ($i = 1; $i < 6; $i++)
            <i class="fas fa-star" data-star-input="{{ $i }}"></i>
        @endfor
        <script>
            document.getElementById('star_rating').value = 1;
            document.querySelectorAll('[data-star-input="1"]').forEach((star) => {
                star.style.color = 'orange';
            });
            document.querySelectorAll('[data-star-input]').forEach((star) => {
                star.addEventListener('click', (e) => {
                    document.getElementById('star_rating').value = e.target.dataset.starInput;
                    document.querySelectorAll('[data-star-input]').forEach((starColouring) => {
                        if (parseInt(starColouring.dataset.starInput) <= parseInt(e.target.dataset.starInput)) {
                            starColouring.style.color = 'orange';
                        } else {
                            starColouring.style.color = 'black';
                        }
                    });
                });
            });
        </script>
    @else
        @for ($i = 1; $i < 6; $i++)
            @if ($i <= $rating)
                <i class="fas fa-star" style="color: orange"></i>
            @else
                <i class="fas fa-star"></i>
            @endif
        @endfor
    @endif
</div>