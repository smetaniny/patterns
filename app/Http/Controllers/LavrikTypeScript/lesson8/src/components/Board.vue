<template>
	<div class="board">
		<AppSquare 
			v-for="square in props.squares"
			:key="square.num"
			:square="square"
			:selected="square.num === selectedSquare"
			:allowed="allowedSquares.includes(square.num)"
			@click="emits('square-clicked', $event)"
		/>
	</div>
</template>
<script lang="ts" setup>
	import AppSquare from '@/components/Square.vue'
	import { AppSquares } from '@/types/chess'
	import { Square } from 'chessops';

	const props = defineProps<{
		squares: AppSquares,
		selectedSquare: Square | null,
		allowedSquares: Square[]
	}>();

	const emits = defineEmits<{
		(e: 'square-clicked', num: Square): void
	}>();

</script>
<style scoped>	
.board{
	display: flex;
	flex-wrap: wrap-reverse;
	width: 480px;
	border-left: 1px solid #000;
	border-top: 1px solid #000;
}
</style>