<template>
	<div @click="emits('click', props.square.num)" class="square" :class="squareClasses">
		
	</div>
</template>
<script lang="ts" setup>
	import { AppSquare } from '@/types/chess'
	import { computed } from '@vue/reactivity';

	const props = defineProps<{
		square: AppSquare,
		selected: boolean,
		allowed: boolean
	}>();

	const emits = defineEmits<{
		(e: 'click', num: AppSquare['num']): void
	}>();

	let isBlack = computed(() => {
		let { num } = props.square;
		let row = parseInt((num / 8).toString());
		let col = num % 8;
		return !(( row % 2 ) ^ ( col % 2 ));
	});

	let squareClasses = computed(() => {
		let { piece } = props.square;

		return {
			'square-dark': isBlack.value,
			[ `square-${piece?.role}-${piece?.color}` ]: piece !== undefined,
			'square-selected': props.selected,
			'square-allowed': props.allowed
		};
	});
</script>

<style scoped>
	.square{
		width: 60px;
		height: 60px;
		box-sizing: border-box;
		border-right: 1px solid #000;
		border-bottom: 1px solid #000;
		background-color: #cfc5b5;
		background-size: cover;
		text-align: center;
		line-height: 60px;
	}

	.square-dark{
		background-color: #9f7e63;
	}

	.square-selected{
		background-color: lightblue;
	}

	.square-allowed:after{
		content: "\2714";
		color: rgb(63, 205, 65);
		font-size: 20px;
	}

	.square-pawn-white{
		background-image: url('@/assets/images/pw.png');
	}
	.square-pawn-black{
		background-image: url('@/assets/images/pb.png');
	}

	.square-knight-white{
		background-image: url('@/assets/images/nw.png');
	}

	.square-knight-black{
		background-image: url('@/assets/images/nb.png');
	}

	.square-bishop-white{
		background-image: url('@/assets/images/bw.png');
	}

	.square-bishop-black{
		background-image: url('@/assets/images/bb.png');
	}

	.square-king-white{
		background-image: url('@/assets/images/kw.png');
	}

	.square-king-black{
		background-image: url('@/assets/images/kb.png');
	}

	.square-queen-white{
		background-image: url('@/assets/images/qw.png');
	}

	.square-queen-black{
		background-image: url('@/assets/images/qb.png');
	}

	.square-rook-white{
		background-image: url('@/assets/images/rw.png');
	}

	.square-rook-black{
		background-image: url('@/assets/images/rb.png');
	}
</style>