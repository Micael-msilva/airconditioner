function addAirConditionerField() {
    const container = document.getElementById('airconditioner-fields');
    const index = container.children.length; // pega o próximo índice

    const card = document.createElement('div');
    card.className = 'p-4 bg-gray-100 rounded-xl shadow-inner space-y-2';

    // Usamos apenas brand (removido o campo modelo)
    const brand = document.createElement('input');
    brand.type = 'text';
    brand.name = `airconditioners[${index}][brand]`;
    brand.placeholder = 'Marca/Modelo';
    brand.className = 'block w-full rounded-md border-gray-300 shadow focus:border-blue-500 focus:ring focus:ring-blue-300 focus:ring-opacity-50';

    const btus = document.createElement('input');
    btus.type = 'number';
    btus.name = `airconditioners[${index}][btus]`;
    btus.placeholder = 'BTUs';
    btus.className = 'block w-full rounded-md border-gray-300 shadow focus:border-blue-500 focus:ring focus:ring-blue-300 focus:ring-opacity-50';

    const descricao = document.createElement('textarea');
    descricao.name = `airconditioners[${index}][description]`;
    descricao.placeholder = 'Descrição';
    descricao.rows = 3;
    descricao.className = 'block w-full rounded-md border-gray-300 shadow focus:border-blue-500 focus:ring focus:ring-blue-300 focus:ring-opacity-50 resize-y';

    const localizacao = document.createElement('input');
    localizacao.type = 'text';
    localizacao.name = `airconditioners[${index}][location]`;
    localizacao.placeholder = 'Localização';
    localizacao.className = 'block w-full rounded-md border-gray-300 shadow focus:border-blue-500 focus:ring focus:ring-blue-300 focus:ring-opacity-50';

    const btn = document.createElement('button');
    btn.type = 'button';
    btn.innerText = 'Remover';
    btn.className = 'bg-red-500 hover:bg-red-600 text-white font-bold py-1 px-3 rounded-lg transition';
    btn.onclick = function() { removeField(btn); };

    // Adiciona apenas os campos necessários
    card.appendChild(brand);
    card.appendChild(btus);
    card.appendChild(descricao);
    card.appendChild(localizacao);
    card.appendChild(btn);

    container.appendChild(card);
}


function removeField(button) {
    button.parentElement.remove();
}

// Resto das funções permanece igual
function toggleDetails(id) {
    const elem = document.getElementById('details-' + id);
    elem.classList.toggle('hidden');
}

function toggleEditForm(id) {
    document.getElementById('editForm-' + id).classList.toggle('hidden');
}

function togglePmocEdit() {
    document.getElementById('pmocEditForm').classList.toggle('hidden');
}

function deleteAirConditioner(id_pmoc, id_airconditioner) {
    if (confirm('Tem certeza que deseja excluir este aparelho?')) {
    window.location.href = '?route=airconditioner_delete&id_pmoc=' + id_pmoc + '&id_airconditioner=' + id_airconditioner;
    }
}

function deletePmoc(id) {
    if (confirm('Tem certeza que deseja excluir este PMOC?')) {
    window.location.href = '?route=pmoc_delete&id_pmoc=' + id;
    }
}

function toggleAddForm() {
    const form = document.getElementById('addAirConditionerForm');
    form.classList.toggle('hidden');
}

tailwind.config = {
    theme: {
    extend: {
        colors: {
        primary: '#2563EB',
        secondary: '#1E40AF',
        accent: '#FBBF24',
        danger: '#DC2626',
        }
    }
    }
}