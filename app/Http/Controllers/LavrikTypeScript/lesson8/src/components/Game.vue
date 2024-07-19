<template>
	<h2 v-if="isCheckmate">Выиграли {{ isWhiteMove ? 'черные' : 'белые' }}</h2>
	<h2 v-else>Ход {{ isWhiteMove ? 'белых' : 'черных' }}</h2>
	<hr>
	<AppBoard
		:squares="squares"
		:selected-square="selectedSquare"
		:allowed-squares="allowedDests"
		@square-clicked="onSquareClicked"
	/>
	<hr>
	<button @click="restart" type="button">Restart</button>
</template>
<script lang="ts" setup>
	import AppBoard from '@/components/Board.vue'
	import { Chess } from 'chessops/chess'
	import { Square, Move } from 'chessops'
	import { ref, reactive, Ref } from 'vue';
	import { AppSquares } from '@/types/chess'

	let game = Chess.default();
	let isWhiteMove = ref(true);
	let isCheckmate = ref(false);
	let selectedSquare: Ref<Square | null> = ref(null);
	let allowedDests: Square[] = reactive([]); /* oops! it is compute from squares, selectedSquare */
	let squares = reactive(initSquares());
	updateSystem();

	function restart(){
		game = Chess.default();
		selectedSquare.value = null;
		allowedDests.splice(0, allowedDests.length);
		updateSystem();
	}

	function makeMove(move: Move){
		game.play(move);
		updateSystem();
	}

	function trySelectPiece(num: Square){
		let piece = game.board.get(num);

		if(piece !== undefined && piece.color === game.turn){
			selectedSquare.value = num;
			
			for(let square of game.dests(num)){
				allowedDests.push(square);
			}
			
			return true;
		}

		return false;
	}

	function onSquareClicked(num: Square){
		if(isCheckmate.value){
			return;
		}

		allowedDests.splice(0, allowedDests.length);

		if(selectedSquare.value === null){
			trySelectPiece(num);
		}
		else{
			let move: Move = { from: selectedSquare.value, to: num }; 

			if(game.isLegal(move)){
				makeMove(move);
				selectedSquare.value = null;
			}
			else if(!trySelectPiece(num)){
				selectedSquare.value = null;
			}
		}
	}

	function initSquares(){
		let squares: AppSquares = [];

		for(let i = 0; i < 64; i++){
			squares.push({ num: i, piece: undefined });
		}

		return squares;
	}

	function updateSystem(){
		squares.forEach(square => {
			let piece = game.board.get(square.num);

			// mb better is simple square.piece !== piece
			if(
				square.piece?.color !== piece?.color ||
				square.piece?.role !== piece?.role ||
				square.piece?.promoted !== piece?.promoted
			){
				square.piece = piece;
			}
		});

		isWhiteMove.value = game.turn === 'white';
		isCheckmate.value = game.isCheckmate();
	}

</script>