function addAirConditionerField() {
    const container = document.getElementById('airconditioner-fields');

    const card = document.createElement('div');
    card.className = 'p-4 bg-gray-100 rounded-xl shadow-inner space-y-2';

    const modelo = document.createElement('input');
    modelo.type = 'text';
    modelo.name = 'airconditioners[]';
    modelo.placeholder = 'Modelo';
    modelo.className = 'block w-full rounded-md border-gray-300 shadow focus:border-blue-500 focus:ring focus:ring-blue-300 focus:ring-opacity-50';

    const btus = document.createElement('input');
    btus.type = 'number';
    btus.name = 'airconditioners[]';
    btus.placeholder = 'BTUs';
    btus.className = 'block w-full rounded-md border-gray-300 shadow focus:border-blue-500 focus:ring focus:ring-blue-300 focus:ring-opacity-50';

    const descricao = document.createElement('textarea');
    descricao.name = 'airconditioners[]';
    descricao.placeholder = 'Descrição';
    descricao.rows = 3;
    descricao.className = 'block w-full rounded-md border-gray-300 shadow focus:border-blue-500 focus:ring focus:ring-blue-300 focus:ring-opacity-50 resize-y';

    const localizacao = document.createElement('input');
    localizacao.type = 'text';
    localizacao.name = 'airconditioners[]';
    localizacao.placeholder = 'Localização';
    localizacao.className = 'block w-full rounded-md border-gray-300 shadow focus:border-blue-500 focus:ring focus:ring-blue-300 focus:ring-opacity-50';

    const btn = document.createElement('button');
    btn.type = 'button';
    btn.innerText = 'Remover';
    btn.className = 'bg-red-500 hover:bg-red-600 text-white font-bold py-1 px-3 rounded-lg transition';
    btn.onclick = function() { removeField(btn); };

    card.appendChild(modelo);
    card.appendChild(btus);
    card.appendChild(descricao);
    card.appendChild(localizacao);
    card.appendChild(btn);

    container.appendChild(card);
}


function removeField(button) {
    button.parentElement.remove();
}

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

function deleteAirConditioner(id) {
    if (confirm('Tem certeza que deseja excluir este aparelho?')) {
    window.location.href = '?route=airconditioner_delete&id_airconditioner=' + id;
    }
}

function deletePmoc(id) {
    if (confirm('Tem certeza que deseja excluir este PMOC?')) {
    window.location.href = '?route=pmoc_delete&id_pmoc=' + id;
    }
}

tailwind.config = {
    theme: {
    extend: {
        colors: {
        primary: '#2563EB', // azul
        secondary: '#1E40AF', // azul mais escuro
        accent: '#FBBF24', // amarelo
        danger: '#DC2626', // vermelho
        }
    }
    }
}