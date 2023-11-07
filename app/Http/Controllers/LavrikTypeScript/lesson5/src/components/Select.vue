<template>
	<div class="form-group">
		<label>{{ label }}</label>
		<select :name="name" @change="onChange" class="form-select">
			<option value="" :selected="'' == value" disabled>Значение не выбрано</option>
			<option 
				v-for="text,optionValue in options"
				:key="optionValue"
				:value="optionValue"
				:selected="optionValue == value" 
			>
				{{ text }}
			</option>
		</select>
	</div>
</template>

<script setup lang="ts">
	const { name, value, label, options } = defineProps<{
		name: string,
		label: string,
		value: string | number
		options: {
			[ key: string | number ]: string
		}
	}>()

	const emits = defineEmits<{
		( e: 'change', value: string | number ): void,
		( e: 'blur', value: null ): void
	}>();

	const onChange = (e: Event) => emits('change', (e.target as HTMLSelectElement).value);
</script>