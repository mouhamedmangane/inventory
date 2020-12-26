  <div class="d-flex justify-content-between">
    <div>
        <x-composant.select-titre :items="$selectTitreItems" :id="$idEnfant('titre')" />
    </div>
    <div>
        <x-composant.action-bar :items="$actionItems" :id="$idEnfant('action_bar')" />
    </div>
  </div>
