import { Controller } from '@hotwired/stimulus';
import { applyRovingTabindex, rovingKeydown } from '../shared/menu-roving.js';

export default class extends Controller {
    static targets = ['list', 'trigger', 'panel'];

    static values = {
        orientation: { type: String, default: 'horizontal' },
        defaultValue: String,
    };

    connect() {
        this._activeIndex = 0;
        this._triggers = this.triggerTargets;
        this._panels = this.panelTargets;

        const initial = this.defaultValueValue
            || this._triggers[0]?.dataset.value
            || '';

        if (initial) {
            this._activateByValue(initial, false);
        } else if (this._triggers.length > 0) {
            this._activateIndex(0, false);
        }

        this._onKeydown = this._onKeydown.bind(this);
        this.element.addEventListener('keydown', this._onKeydown);
    }

    disconnect() {
        this.element.removeEventListener('keydown', this._onKeydown);
    }

    select(event) {
        const value = event.currentTarget.dataset.value;
        if (value) {
            this._activateByValue(value, true);
        }
    }

    _onKeydown(event) {
        if (!this.hasListTarget) {
            return;
        }

        const items = this._triggers;
        const next = rovingKeydown(event, items, this._activeIndex, this.orientationValue);
        if (next !== this._activeIndex) {
            this._activateIndex(next, true);
        }
    }

    _activateByValue(value, focus) {
        const index = this._triggers.findIndex((el) => el.dataset.value === value);
        if (index >= 0) {
            this._activateIndex(index, focus);
        }
    }

    _activateIndex(index, focus) {
        this._activeIndex = index;
        applyRovingTabindex(this._triggers, index);

        const activeValue = this._triggers[index]?.dataset.value;
        this._panels.forEach((panel) => {
            const match = panel.dataset.value === activeValue;
            panel.hidden = !match;
            panel.setAttribute('aria-hidden', match ? 'false' : 'true');
        });

        this._triggers.forEach((trigger, i) => {
            const selected = i === index;
            trigger.setAttribute('aria-selected', selected ? 'true' : 'false');
            trigger.tabIndex = selected ? 0 : -1;
        });

        if (focus) {
            this._triggers[index]?.focus();
        }
    }
}
