<template>
	<div class="container mt-3">
		<Suspense>
			<AppFrom />
			<template #fallback>
				<AppLoading />
			</template>
		</Suspense>
	</div>
</template>

<script setup lang="ts">
	import AppFrom from '@/components/Form.vue'
	import AppLoading from '@/components/Loading.vue'
</script>