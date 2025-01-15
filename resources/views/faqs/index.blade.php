<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('FAQ') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        @foreach ($categorieën as $categorie)
            <strong>{{ $categorie->naam }}</strong>
            <ul>
                @forelse ($categorie->faqs as $faq)
                    <li>
                        <div class="faq-item">
                            <button class="faq-question"><strong>{{ $faq->vraag }} </strong><span class="icon">+</span></button>
                            <div class="faq-answer">{{ $faq->antwoord }}</div>
                        </div>
                    </li>
                @empty
                    <li>Geen vragen beschikbaar in deze categorie.</li>
                @endforelse
            </ul>
        @endforeach
        </div>
    </div>

</x-app-layout>

<script>
    document.addEventListener('DOMContentLoaded', () => 
    {   // vraag ophalen
        const questions = document.querySelectorAll('.faq-question');

        questions.forEach(question => 
        {
            question.addEventListener('click', () => 
            {
                question.classList.toggle('active');
                
                const answer = question.nextElementSibling;
                const icon = question.querySelector('.icon');

                // als niet geklikt hebt + weergeven anders -
                if (answer.style.display === 'block') 
                {
                    answer.style.display = 'none';
                    icon.textContent = '+';
                } 
                else 
                {
                    answer.style.display = 'block';
                    icon.textContent = '-';
                }
            });
        });
    });
</script>

<style>
.faq 
{
    max-width: 800px;
    margin: 50px auto;
    padding: 20px;
    background: #fff;
    border-radius: 8px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

h1 

.faq-item 
{
    margin-bottom: 10px;
    border: 1px solid #ddd;
    border-radius: 5px;
    overflow: hidden;
}

.faq-question {
    width: 100%;
    padding: 15px;
    background: #f0f0f0;
    border: none;
    text-align: left;
    font-size: 1.1rem;
    cursor: pointer;
    font-weight: bold;
    display: flex;
    justify-content: space-between; 
    align-items: center; 
}

.faq-question .icon {
    margin-left: auto !important;
}

.faq-answer 
{
    display: none;
    padding: 15px;
    background: #fff;
    font-size: 1rem;
    color: #333;
}

</style>